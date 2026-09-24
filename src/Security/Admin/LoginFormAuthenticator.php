<?php

namespace App\Security\Admin;

use App\Entity\Admin\User;
use App\Repository\Admin\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Connexion admin via le formulaire /admin/login.
 */
final class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'admin_login';
    private const CSRF_TOKEN_ID = 'authenticate';

    // Même message si l'email ou le mot de passe est faux (ne révèle pas les comptes)
    private const ERROR_INVALID = 'Identifiants invalides.';
    private const ERROR_CSRF = 'Session expirée. Veuillez réessayer.';

    private UserRepository $users;
    private EntityManagerInterface $em;
    private UrlGeneratorInterface $urlGenerator;
    private CsrfTokenManagerInterface $csrfTokenManager;
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(
        UserRepository $users,
        EntityManagerInterface $em,
        UrlGeneratorInterface $urlGenerator,
        CsrfTokenManagerInterface $csrfTokenManager,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->users = $users;
        $this->em = $em;
        $this->urlGenerator = $urlGenerator;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    // S'active uniquement à l'envoi du formulaire
    public function supports(Request $request): bool
    {
        return self::LOGIN_ROUTE === $request->attributes->get('_route') && $request->isMethod('POST');
    }

    // Données du formulaire
    public function getCredentials(Request $request): array
    {
        $credentials = [
            'email' => mb_strtolower(trim((string) $request->request->get('email', ''))),
            'password' => (string) $request->request->get('password', ''),
            'csrf_token' => (string) $request->request->get('_csrf_token', ''),
        ];

        // Garde l'email pré-rempli en cas d'erreur
        $request->getSession()->set(Security::LAST_USERNAME, $credentials['email']);

        return $credentials;
    }

    // Vérifie le jeton CSRF puis charge l'admin
    public function getUser($credentials, UserProviderInterface $userProvider): ?UserInterface
    {
        if (!$this->csrfTokenManager->isTokenValid(new CsrfToken(self::CSRF_TOKEN_ID, $credentials['csrf_token']))) {
            throw new CustomUserMessageAuthenticationException(self::ERROR_CSRF);
        }

        $user = $credentials['email'] === '' ? null : $this->users->findOneByEmail($credentials['email']);

        if ($user === null) {
            throw new CustomUserMessageAuthenticationException(self::ERROR_INVALID);
        }

        return $user;
    }

    // Vérifie le mot de passe
    public function checkCredentials($credentials, UserInterface $user): bool
    {
        if (!$this->passwordEncoder->isPasswordValid($user, $credentials['password'])) {
            throw new CustomUserMessageAuthenticationException(self::ERROR_INVALID);
        }

        return true;
    }

    // Permet à Symfony de mettre à jour le hash si besoin
    public function getPassword($credentials): ?string
    {
        return $credentials['password'];
    }

    // Connexion réussie
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey): Response
    {
        $user = $token->getUser();
        if ($user instanceof User) {
            $user->setLastLoginAt(new \DateTimeImmutable());
            $this->em->flush();
        }

        // Page demandée avant la connexion, sinon tableau de bord
        $targetPath = $this->getTargetPath($request->getSession(), $providerKey);

        return new RedirectResponse($targetPath ?: $this->urlGenerator->generate('admin_dashboard'));
    }

    protected function getLoginUrl(): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}