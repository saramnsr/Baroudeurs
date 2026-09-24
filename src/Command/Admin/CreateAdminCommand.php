<?php

namespace App\Command\Admin;

use App\Entity\Admin\User;
use App\Repository\Admin\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Crée un admin (seul moyen : pas d'inscription publique).
 */
final class CreateAdminCommand extends Command
{
    protected static $defaultName = 'app:create-admin';

    // Longueur minimale du mot de passe (8+ recommandé en production)
    private const MIN_PASSWORD_LENGTH = 4;

    private EntityManagerInterface $em;
    private UserRepository $users;
    private UserPasswordEncoderInterface $encoder;

    public function __construct(EntityManagerInterface $em, UserRepository $users, UserPasswordEncoderInterface $encoder)
    {
        parent::__construct();
        $this->em = $em;
        $this->users = $users;
        $this->encoder = $encoder;
    }

    protected function configure(): void
    {
        $this->setDescription('Crée un administrateur ou réinitialise son mot de passe.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Création d\'un administrateur');

        // Email
        $email = $io->ask('Adresse email', null, static function ($value): string {
            $value = mb_strtolower(trim((string) $value));
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                throw new \RuntimeException('Adresse email invalide.');
            }

            return $value;
        });

        // Si l'admin existe déjà : proposer de changer le mot de passe
        $user = $this->users->findOneByEmail($email);
        if ($user !== null && !$io->confirm('Cet admin existe déjà. Réinitialiser son mot de passe ?', false)) {
            $io->note('Aucune modification.');

            return 0;
        }

        // Mot de passe (caché à la saisie)
        $password = $io->askHidden(sprintf('Mot de passe (%d caractères minimum)', self::MIN_PASSWORD_LENGTH), static function ($value): string {
            $value = (string) $value;
            if (mb_strlen($value) < self::MIN_PASSWORD_LENGTH) {
                throw new \RuntimeException(sprintf('Minimum %d caractères.', self::MIN_PASSWORD_LENGTH));
            }

            return $value;
        });

        // Confirmation
        $io->askHidden('Confirmez le mot de passe', static function ($value) use ($password): string {
            if ((string) $value !== $password) {
                throw new \RuntimeException('Les mots de passe ne correspondent pas.');
            }

            return (string) $value;
        });

        // Création ou mise à jour
        $isNew = $user === null;
        $user = $user ?? (new User())->setEmail($email)->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->encoder->encodePassword($user, $password));

        $this->em->persist($user);
        $this->em->flush();

        $io->success(sprintf('Admin « %s » %s.', $email, $isNew ? 'créé' : 'mis à jour'));

        return 0;
    }
}