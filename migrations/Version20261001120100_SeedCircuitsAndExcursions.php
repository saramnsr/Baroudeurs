<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Seeds 7 circuits and 2 excursions.
 * Data is identical to CircuitFixtures / ExcursionFixtures.
 * IDs are explicit (1..7 circuits, 1..2 excursions) so URLs don't change.
 */
final class Version20261001120100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Seed circuits (1-7) and excursions (1-2).';
    }

    public function up(Schema $schema): void
    {
        $conn = $this->connection;
        $now  = (new \DateTimeImmutable())->format('Y-m-d H:i:s');

        $circuits = require __DIR__ . '/data/circuits.php';
        $excursions = require __DIR__ . '/data/excursions.php';

        foreach ($circuits as $id => $c) {
            $conn->insert('circuit', [
                'id' => $id,
                'image' => $c['image'],
                'title_fr' => $c['title']['fr'],
                'title_en' => $c['title']['en'],
                'title_ar' => $c['title']['ar'],
                'title_it' => $c['title']['it'],
                'description_fr' => $c['description']['fr'],
                'description_en' => $c['description']['en'],
                'description_ar' => $c['description']['ar'],
                'description_it' => $c['description']['it'],
                'duration_fr' => $c['duration']['fr'] ?? null,
                'duration_en' => $c['duration']['en'] ?? null,
                'duration_ar' => $c['duration']['ar'] ?? null,
                'duration_it' => $c['duration']['it'] ?? null,
                'icons' => json_encode($c['icons'] ?? [], JSON_UNESCAPED_UNICODE),
                'position' => $id,
                'intro_fr' => $c['intro']['fr'] ?? null,
                'intro_en' => $c['intro']['en'] ?? null,
                'intro_ar' => $c['intro']['ar'] ?? null,
                'intro_it' => $c['intro']['it'] ?? null,
                'full_description_fr' => $c['fullDescription']['fr'] ?? null,
                'full_description_en' => $c['fullDescription']['en'] ?? null,
                'full_description_ar' => $c['fullDescription']['ar'] ?? null,
                'full_description_it' => $c['fullDescription']['it'] ?? null,
                'itinerary_summary_fr' => $c['itinerarySummary']['fr'] ?? null,
                'itinerary_summary_en' => $c['itinerarySummary']['en'] ?? null,
                'itinerary_summary_ar' => $c['itinerarySummary']['ar'] ?? null,
                'itinerary_summary_it' => $c['itinerarySummary']['it'] ?? null,
                'itinerary_fr' => json_encode($c['itinerary']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_en' => json_encode($c['itinerary']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_ar' => json_encode($c['itinerary']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_it' => json_encode($c['itinerary']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_fr' => json_encode($c['itineraryDetail']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_en' => json_encode($c['itineraryDetail']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_ar' => json_encode($c['itineraryDetail']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_it' => json_encode($c['itineraryDetail']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_fr' => json_encode($c['included']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_en' => json_encode($c['included']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_ar' => json_encode($c['included']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_it' => json_encode($c['included']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_fr' => json_encode($c['excluded']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_en' => json_encode($c['excluded']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_ar' => json_encode($c['excluded']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_it' => json_encode($c['excluded']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_icons' => json_encode($c['includedIcons'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_icons' => json_encode($c['excludedIcons'] ?? [], JSON_UNESCAPED_UNICODE),
                'gallery_images' => json_encode($c['gallery'] ?? [], JSON_UNESCAPED_UNICODE),
                'closing_fr' => $c['closing']['fr'] ?? null,
                'closing_en' => $c['closing']['en'] ?? null,
                'closing_ar' => $c['closing']['ar'] ?? null,
                'closing_it' => $c['closing']['it'] ?? null,
                'review_avatar' => $c['review']['avatar'] ?? null,
                'review_name' => $c['review']['name'] ?? null,
                'review_country' => $c['review']['country'] ?? null,
                'review_rating' => $c['review']['rating'] ?? null,
                'review_comment_fr' => $c['review']['comment']['fr'] ?? null,
                'review_comment_en' => $c['review']['comment']['en'] ?? null,
                'review_comment_ar' => $c['review']['comment']['ar'] ?? null,
                'review_comment_it' => $c['review']['comment']['it'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
                'view_count' => 0,
            ]);
        }

        foreach ($excursions as $id => $e) {
            $conn->insert('excursion', [
                'id' => $id,
                'image' => $e['image'],
                'title_fr' => $e['title']['fr'],
                'title_en' => $e['title']['en'],
                'title_ar' => $e['title']['ar'],
                'title_it' => $e['title']['it'],
                'description_fr' => $e['description']['fr'],
                'description_en' => $e['description']['en'],
                'description_ar' => $e['description']['ar'],
                'description_it' => $e['description']['it'],
                'duration_fr' => $e['duration']['fr'] ?? null,
                'duration_en' => $e['duration']['en'] ?? null,
                'duration_ar' => $e['duration']['ar'] ?? null,
                'duration_it' => $e['duration']['it'] ?? null,
                'icons' => json_encode($e['icons'] ?? [], JSON_UNESCAPED_UNICODE),
                'position' => $id,
                'included_fr' => json_encode($e['included']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_en' => json_encode($e['included']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_ar' => json_encode($e['included']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_it' => json_encode($e['included']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'intro_fr' => $e['intro']['fr'] ?? null,
                'intro_en' => $e['intro']['en'] ?? null,
                'intro_ar' => $e['intro']['ar'] ?? null,
                'intro_it' => $e['intro']['it'] ?? null,
                'full_description_fr' => $e['fullDescription']['fr'] ?? null,
                'full_description_en' => $e['fullDescription']['en'] ?? null,
                'full_description_ar' => $e['fullDescription']['ar'] ?? null,
                'full_description_it' => $e['fullDescription']['it'] ?? null,
                'itinerary_summary_fr' => $e['itinerarySummary']['fr'] ?? null,
                'itinerary_summary_en' => $e['itinerarySummary']['en'] ?? null,
                'itinerary_summary_ar' => $e['itinerarySummary']['ar'] ?? null,
                'itinerary_summary_it' => $e['itinerarySummary']['it'] ?? null,
                'itinerary_fr' => json_encode($e['itinerary']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_en' => json_encode($e['itinerary']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_ar' => json_encode($e['itinerary']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_it' => json_encode($e['itinerary']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_fr' => json_encode($e['itineraryDetail']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_en' => json_encode($e['itineraryDetail']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_ar' => json_encode($e['itineraryDetail']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'itinerary_detail_it' => json_encode($e['itineraryDetail']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_fr' => json_encode($e['excluded']['fr'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_en' => json_encode($e['excluded']['en'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_ar' => json_encode($e['excluded']['ar'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_it' => json_encode($e['excluded']['it'] ?? [], JSON_UNESCAPED_UNICODE),
                'included_icons' => json_encode($e['includedIcons'] ?? [], JSON_UNESCAPED_UNICODE),
                'excluded_icons' => json_encode($e['excludedIcons'] ?? [], JSON_UNESCAPED_UNICODE),
                'meals_breakfast_fr' => null,
                'meals_breakfast_en' => null,
                'meals_breakfast_ar' => null,
                'meals_breakfast_it' => null,
                'meals_lunch_fr' => null,
                'meals_lunch_en' => null,
                'meals_lunch_ar' => null,
                'meals_lunch_it' => null,
                'meals_dinner_fr' => null,
                'meals_dinner_en' => null,
                'meals_dinner_ar' => null,
                'meals_dinner_it' => null,
                'gallery_images' => json_encode($e['gallery'] ?? [], JSON_UNESCAPED_UNICODE),
                'closing_fr' => $e['closing']['fr'] ?? null,
                'closing_en' => $e['closing']['en'] ?? null,
                'closing_ar' => $e['closing']['ar'] ?? null,
                'closing_it' => $e['closing']['it'] ?? null,
                'review_avatar' => $e['review']['avatar'] ?? null,
                'review_name' => $e['review']['name'] ?? null,
                'review_country' => $e['review']['country'] ?? null,
                'review_rating' => $e['review']['rating'] ?? null,
                'review_comment_fr' => $e['review']['comment']['fr'] ?? null,
                'review_comment_en' => $e['review']['comment']['en'] ?? null,
                'review_comment_ar' => $e['review']['comment']['ar'] ?? null,
                'review_comment_it' => $e['review']['comment']['it'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
                'deleted_at' => null,
                'view_count' => 0,
            ]);
        }
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM circuit WHERE id BETWEEN 1 AND 7');
        $this->addSql('DELETE FROM excursion WHERE id BETWEEN 1 AND 2');
    }
}