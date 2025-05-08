<?php
namespace Database\Seeders;
use App\Models\Chapter;
use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\Choice;

class Story1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a story
        $story = Story::create([
            'title' => 'titre de l\'histoire',
            'content' => 'Êtes-vous prêt·e à être pertubé·e ?',
            'image' => 'https://example.com/image.jpg',
        ]);

        // Create choices for the story
        $chapter1 = Chapter::create([
            'title' => 'Chapitre 1 : Le retour à la maison',
            'story_id' => $story->id,
            'content' => "Michel rentre chez lui après un long dîner professionnel. Il est 23h30, ses paupières sont lourdes alors qu'il tourne la clé dans la serrure de son appartement.",
            //'next_story_id' => null, // This choice leads to another story
        ]);

        $chapter2 = Chapter::create([
            'title' => 'Chapitre 2 : La préparation au coucher',
            'story_id' => $story->id,
            'content' => "Michel est épuisé mais il doit encore se préparer pour la nuit.",
        ]);

        $chapter3 = Chapter::create([
            'title' => 'Chapitre 3 : L\'insomnie',
            'story_id' => $story->id,
            'content' => "Malgré sa fatigue, Michel se tourne et se retourne dans son lit. Le sommeil ne vient pas.",
        ]);


        $chapter4 = Chapter::create([
            'title' => 'Chapitre 4 : Le réveil étrange',
            'story_id' => $story->id,
            'content' => "Michel ouvre les yeux, désorienté. Au lieu du plafond de sa chambre, il voit des néons industriels. Il est allongé sur un sol froid. Des rayonnages l'entourent.",
        ]);

        $chapter5 = Chapter::create([
            'title' => 'Chapitre 5 : La peur',
            'story_id' => $story->id,
            'content' => "Michel réalise qu'il est dans le supermarché du quartier. Des voix agressives résonnent depuis la caisse. Il aperçoit d'autres personnes au sol, certaines inconscientes.",
        ]);

        $chapter6 = Chapter::create([
            'title' => 'Chapitre 6 : Les braqueurs',
            'story_id' => $story->id,
            'content' => "Michel aperçoit deux hommes masqués, armés, qui menacent un caissier terrifié. Un troisième surveille l'entrée principale.",
        ]);

        $chapter7 = Chapter::create([
            'title' => 'Chapitre 7 : L\'étrangeté',
            'story_id' => $story->id,
            'content' => 'Michel remarque des détails troublants: l\'horloge du magasin indique plusieurs heures différentes selon qu\'il la regarde, les produits sur les étagères changent parfois quand il détourne le regard.',
        ]);


        $chapter8 = Chapter::create([
            'title' => 'Chapitre 8 : La confrontation',
            'story_id' => $story->id,
            'content' => 'Un des braqueurs remarque Michel et le menace directement. Étrangement, le visage du criminel lui semble familier.',
        ]);

        $chapter9 = Chapter::create([
            'title' => 'Chapitre 9 : La révélation progressive',
            'story_id' => $story->id,
            'content' => 'Le braqueur enlève son masque. Michel est stupéfait de reconnaître... son propre visage, mais légèrement différent.',
        ]);

        $chapter10 = Chapter::create([
            'title' => 'Chapitre 10 : Le réveil',
            'story_id' => $story->id,
            'content' => 'La réalité se fragmente autour de Michel. Les murs du supermarché se dissolvent... Michel se réveille brutalement dans son lit, en sueur.  À présent bien éveillé, Michel est stupéfait des images qu’il a gardé en mémoire de sa nuitée mouvementée.',
        ]);

        $chapter11 = Chapter::create([
            'title' => 'Chapitre 11 : La fin',
            'story_id' => $story->id,
            'content' => 'Arrivé en face de la superette, Michel ne peut y accèder car l’entrée est barrée par une banderole rouge et blanche. Des policiers se relayent, entrent et sortent du magasin qui est dans un état cataclysmique. Michel reconnaît le visage d\'un homme blessé, couché dans l’ambulance. Son visage lui est étrangement familier… THE END',
            'is_final' => true,
        ]);


        Choice::create(['text' => 'Il se dirige directement vers la salle de bain pour se brosser les dents', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2->id, 'feedback' => "Les dents ont été brossées avec succès"]);
        Choice::create(['text' => 'Il se laisse tomber sur le canapé pour vérifier ses messages', 'chapter_id' => $chapter1->id, 'next_chapter_id' => $chapter2->id, 'feedback' => "Il finira par doomscroller pendant 2 heures"]);

        Choice::create(['text' => 'Une douche rapide puis directement au lit', 'chapter_id' => $chapter2->id, 'next_chapter_id' => $chapter3->id, 'feedback' => "Il vous remercie pour ce choix, il avait bien besoin d'une douche."]);
        Choice::create(['text' => 'Pas de douche ce soir, il enfile son pyjama de la veille', 'chapter_id' => $chapter2->id, 'next_chapter_id' => $chapter3->id, 'feedback' => "Heuu messieurs je suis un peu mal à l'aise là... Comment ça pas de douche ?????"]);

        Choice::create(['text' => 'Prendre un somnifère et commencer à lire un roman policier', 'chapter_id' => $chapter3->id, 'next_chapter_id' => $chapter4->id, 'feedback' => "Il sent que le somnifère l'a ramoli mais il n'arrive pourtant pas à s'endormir."]);
        Choice::create(['text' => 'Se lever et regarder la télévision jusqu\'à s\'endormir', 'chapter_id' => $chapter3->id, "is_ending" => true, 'feedback' => "Le lendemain matin, Michel se réveille. Malheureusement, sa nuit n'a pas été de tout repos, il n'a pas de souvenir, et pourtant il est convaincu de ne pas avoir passé la nuit dans son lit... Recommencez la partie pour en savoir plus sur sa nuit troublante ! (gardez en tête que cette réponse ne vous a pas mené bien loin..."]);

        Choice::create(['text' => 'Se relever immédiatement et chercher une sortie', 'chapter_id' => $chapter4->id, 'next_chapter_id' => $chapter5->id, 'feedback' => "Michel trébuche sur une caisse en se relevant, mais aperçoit une lumière au loin."]);
        Choice::create(['text' => 'Rester immobile et observer la situation discrètement', 'chapter_id' => $chapter4->id, 'next_chapter_id' => $chapter5->id, 'feedback' => "Son cœur bat vite, mais il capte des sons qui l’aident à comprendre où il est."]);


        Choice::create(['text' => 'Se rapprocher discrètement des caisses pour voir ce qui se passe', 'chapter_id' => $chapter5->id, 'next_chapter_id' => $chapter6->id, 'feedback' => "Michel se faufile sans bruit et aperçoit des silhouettes menaçantes."]);
        Choice::create(['text' => 'Chercher son téléphone pour appeler à l\'aide', 'chapter_id' => $chapter5->id, 'next_chapter_id' => $chapter6->id, 'feedback' => "Oups, il semblerait que le téléphone soit resté sur la table de chevet."]);

        Choice::create(['text' => 'Tenter de trouver une issue de secours sans se faire remarquer', 'chapter_id' => $chapter6->id, 'next_chapter_id' => $chapter7->id, 'feedback' => "Michel avance discrètement, mais sa vision se trouble soudainement…"]);
        Choice::create(['text' => 'Observer et attendre le bon moment pour agir', 'chapter_id' => $chapter6->id, 'next_chapter_id' => $chapter7->id, 'feedback' => "Il se cache derrière une étagère et tente de décrypter la scène."]);


        Choice::create(['text' => 'Il l\'ignore, se concentrant uniquement sur sa survie', 'chapter_id' => $chapter7->id, 'next_chapter_id' => $chapter8->id, 'feedback' => "Michel a secoué la tête, préférant rester ancré dans le concret."]);
        Choice::create(['text' => 'Il commence à douter de sa perception et se demande s\'il hallucine', 'chapter_id' => $chapter7->id, 'next_chapter_id' => $chapter8->id, 'feedback' => "Michel commence à paniquer intérieurement, tout semble irréel."]);

        Choice::create(['text' => 'Il tente de raisonner le braqueur, sentant qu\'il le connaît', 'chapter_id' => $chapter8->id, 'next_chapter_id' => $chapter9->id, 'feedback' => "La voix du braqueur tremble. Il baisse légèrement son arme"]);
        Choice::create(['text' => 'Il obéit passivement à toutes les instructions', 'chapter_id' => $chapter8->id, 'next_chapter_id' => $chapter9->id, 'feedback' => "Michel lève les mains. Son cœur bat à tout rompre, mais le braqueur semble hésiter."]);

        Choice::create(['text' => 'Il pense être victime d\'une expérience psychologique élaborée', 'chapter_id' => $chapter9->id, 'next_chapter_id' => $chapter10->id, 'feedback' => "Michel tente de garder son calme. Tout cela est peut-être une mise en scène."]);
        Choice::create(['text' => 'Il croit avoir rencontré un jumeau dont il ignorait l\'existence', 'chapter_id' => $chapter9->id, 'next_chapter_id' => $chapter10->id, 'feedback' => "Un frisson le parcourt. Et si sa vie avait été une illusion depuis le départ ?"]);

        Choice::create(['text' => 'Il tente d’ignorer ses souvenirs et de commencer sa journée comme d’habitude.', 'chapter_id' => $chapter10->id, 'next_chapter_id' => $chapter11->id, 'feedback' => "Après avoir mis un peu de temps à sortir de son lit, Michel se rend compte qu'il meurt.. de faim ! lol. Alors il descend dans le supermarché du coin, celui où il a l'habitude d'aller taper la causette avec le caissier en achetant son croissant au beurre."]);
        Choice::create(['text' => 'Il se réveille et accourt au supermarché qu’il a cru reconnaître de son rêve, celui en bas de son immeuble', 'chapter_id' => $chapter10->id, 'next_chapter_id' => $chapter11->id, 'feedback' => "Dans la rue, la panique semble reigner..."]);

    }
}
