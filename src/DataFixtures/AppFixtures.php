<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Gemmotherapy;
use App\Entity\Posology;
use App\Entity\Treatment;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $userPasswordHasher;
    
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'un user admin
        $userAdmin = new User();
        $userAdmin->setUsername("admin");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "password357"));
        $manager->persist($userAdmin);

        $gemmo1 = new Gemmotherapy();
        $gemmo1->setName("Aulne glutineux bourgeons");
        $gemmo1->setLatinName("Alnus Glutinosa");
        $gemmo1->setDescription("Ce végétal affectionne les lieux humides. Son bois ne se corrompt pas au contact de l'eau. 
        Il sera indiqué dans les états dits 'hudrogénoïdes', c'est-à-dire tous ceux aggravés par l'humidité et au premier 
        chef les douleurs rhumatismales. La forme de sa feuille évoquant un cerveau vu en coupe, il est intéressant pour son 
        action sur le réseau capillaire artériel qu'irrigue le cerveau et le système nerveux central.");
        $manager->persist($gemmo1);
        $gemmo2 = new Gemmotherapy();
        $gemmo2->setName("Charme");
        $gemmo2->setLatinName("Carpinus Betulus bourgeons");
        $gemmo2->setDescription("Le Charme symbolise l'énergie vitale, la vigueur et surtout l'adaptation. 
        Il fait face à toutes les situations, les difficultés, les contradictions. Il convient à des tempéraments souples, 
        intelligents et robustes. C'est un très grand remède de la sphère ORL et de l'appareil respiratoire.");
        $manager->persist($gemmo2);
        $gemmo3 = new Gemmotherapy();
        $gemmo3->setName("Aubépine");
        $gemmo3->setLatinName("Crataegus Oxyacantha bourgeons");
        $gemmo3->setDescription("Symbole de longévité, il agit sur ces 2 pôles essentiels que sont le coeur et le cerveau. 
        Il agit aussi sur la tension artérielle et d'une manière originale car elle est à double entrée, c'est un 
        normo-tensio-régulateur.");
        $manager->persist($gemmo3);
        $gemmo4 = new Gemmotherapy();
        $gemmo4->setName("Figuier bourgeons");
        $gemmo4->setLatinName("Ficus Carica");
        $gemmo4->setDescription("Le bourgeon de Ficus Carica a de remarquables propriétés médicinales. Il exerce une action 
        régulatrice sur le cerveau et plus précisemment sur l'axe qui réunit le cortex cérébral à un noyau gris central, 
        l'hypotalamus. Or cet axe commande toute la sphère des émotions, des angoisses, des peurs variées, des obsessions. 
        L'appareil digestif est également sensible à son action. Estomac et intestin résonnent au rythme des nos anxiétés, 
        de nos états d'âme.");
        $manager->persist($gemmo4);
        $gemmo5 = new Gemmotherapy();
        $gemmo5->setName("Cassis bourgeons");
        $gemmo5->setLatinName("Ribes Nigrum");
        $gemmo5->setDescription("C'est un puissant anti-inflammatoire et draineur universel (capable de nettoyer tout 
        l'organisme). Les bourgeons de Cassis agissent sur tous les paramètres de l'inflammation et surtout de l'inflammation 
        allergique. Ils sont comme une cortisone naturelle. C'est aussi le bourgeon de l'apaisement des situations difficiles. Il 
        convient bien à tous ceux dont l'organisme a été surmené par des affections longues et traînantes. Il permet un retour 
        à l'équilibre et à la paix des tissus.");
        $manager->persist($gemmo5);
        $gemmo6 = new Gemmotherapy();
        $gemmo6->setName("Olivier jeunes pousses");
        $gemmo6->setLatinName("Olea Europea jeunes pousses");
        $gemmo6->setDescription("C'est un symbole de paix, sagesse, prospérité. En gemmothérapie on utilise les jeunes pousses. 
        Il aide à traiter de nombreuses affections impliquant le terrain vasculaire : hypertension artérielle, perturbations du 
        bilan lipidique, artériosclérose, défaillances circulatoires cérébrales, diabète gras.");
        $manager->persist($gemmo6);
        $gemmo7 = new Gemmotherapy();
        $gemmo7->setName("Tilleul bourgeons");
        $gemmo7->setLatinName("Tilia Tomentosa bourgeons");
        $gemmo7->setDescription("Les bourgeons de Tilleul ont cette propriété de régénéreration des mécanismes nerveux ayant 
        souffert. L'action sera un véritable traitement permettant de récupérer des mécanismes d'endormissement et de 
        résistance nerveuse normaux. Ils sont aussi anti-inflammatoires et antispasmodiques. Ils agissent sur les taux 
        d'acide urique et de cholestérol en les faisant diminuer. Ils vont pouvoir agir sur tout le tube digestif par leur action 
        sédative calmante et antispasmodique. Ils aident à la perte de poids par action nerveuse et par action générale sur 
        les circuits d'élimination du corps.");
        $manager->persist($gemmo7);


        $traitement1 = new Treatment();
        $traitement1->setkeywords("rhumatisme");
        $manager->persist($traitement1);
        $traitement2 = new Treatment();
        $traitement2->setkeywords("perte de mémoire,amnésie");
        $manager->persist($traitement2);
        $traitement3 = new Treatment();
        $traitement3->setkeywords("migraine");
        $manager->persist($traitement3);
        $traitement4 = new Treatment();
        $traitement4->setkeywords("rhinite,sinusite");
        $manager->persist($traitement4);
        $traitement5 = new Treatment();
        $traitement5->setkeywords("rhume des foins");
        $manager->persist($traitement5);
        $traitement6 = new Treatment();
        $traitement6->setkeywords("cholestérol");
        $manager->persist($traitement6);
        $traitement7 = new Treatment();
        $traitement7->setkeywords("hypertension");
        $manager->persist($traitement7);
        $traitement8 = new Treatment();
        $traitement8->setkeywords("névrose,nervosité,dépression,TOC,insomnie");
        $manager->persist($traitement8);
        $traitement9 = new Treatment();
        $traitement9->setkeywords("hernie hatiale,aigreur,acidité,crampe d'estomac,douleur gastrique,brûlures d'estomac");
        $manager->persist($traitement9);
        $traitement10 = new Treatment();
        $traitement10->setkeywords("ulcère");
        $manager->persist($traitement10);
        $traitement11 = new Treatment();
        $traitement11->setkeywords("insomnie");
        $manager->persist($traitement11);

        $posology1 = new Posology();
        $posology1->setGemmotherapy($gemmo1); // Aulne
        $posology1->setTreatment($traitement1); // Rhumatisme
        $posology1->setDosage("5 à 6 gouttes par jour");
        $manager->persist($posology1);
        $posology2 = new Posology();
        $posology2->setGemmotherapy($gemmo1); // Aule
        $posology2->setTreatment($traitement2); // Mémoire
        $posology2->setDosage("5 à 6 gouttes par jour");
        $manager->persist($posology2);
        $posology7 = new Posology();
        $posology7->setGemmotherapy($gemmo3); // Aubépine
        $posology7->setTreatment($traitement2); // Mémoire
        $posology7->setDosage("5 gouttes par jour");
        $manager->persist($posology7);
        $posology3 = new Posology();
        $posology3->setGemmotherapy($gemmo1); // Aule
        $posology3->setTreatment($traitement2); // Migraine
        $posology3->setDosage("3 gouttes, 3-4 fois, toutes les 2 heures");
        $manager->persist($posology3);
        $posology4 = new Posology();
        $posology4->setGemmotherapy($gemmo2); // Charme
        $posology4->setTreatment($traitement4); // Rhinite, sinusite
        $posology4->setDosage("4 à 10 gouttes par jour");
        $manager->persist($posology4);
        $posology5 = new Posology();
        $posology5->setGemmotherapy($gemmo2); // Charme
        $posology5->setTreatment($traitement5); // Rhume des foins
        $posology5->setDosage("5 gouttes à midi");
        $manager->persist($posology5);
        $posology6 = new Posology();
        $posology6->setGemmotherapy($gemmo5); // Cassis
        $posology6->setTreatment($traitement5); // Rhume des foins
        $posology6->setDosage("5 gouttes au dîner");
        $manager->persist($posology6);
        $posology8 = new Posology();
        $posology8->setGemmotherapy($gemmo3); // Aubébine
        $posology8->setTreatment($traitement7); // Hypertension
        $posology8->setDosage("5 à 7 gouttes au dîner");
        $manager->persist($posology8);
        $posology9 = new Posology();
        $posology9->setGemmotherapy($gemmo6); // Olivier
        $posology9->setTreatment($traitement7); // Hypertension
        $posology9->setDosage("5 à 7 gouttes au dîner");
        $manager->persist($posology9);
        $posology10 = new Posology();
        $posology10->setGemmotherapy($gemmo4); // Figuier
        $posology10->setTreatment($traitement8); // Nervosité
        $posology10->setDosage("5 à 10 gouttes par jour");
        $manager->persist($posology10);
        $posology11 = new Posology();
        $posology11->setGemmotherapy($gemmo4); // Figuier
        $posology11->setTreatment($traitement11); // Insomnie
        $posology11->setDosage("5 à 10 gouttes au coucher");
        $manager->persist($posology11);
        $posology12 = new Posology();
        $posology12->setGemmotherapy($gemmo4); // Figuier
        $posology12->setTreatment($traitement9); // Estomac
        $posology12->setDosage("7 gouttes le matin");
        $manager->persist($posology12);
        $posology13 = new Posology();
        $posology13->setGemmotherapy($gemmo5); // Cassis
        $posology13->setTreatment($traitement9); // Estomac
        $posology13->setDosage("7 gouttes le midi");
        $manager->persist($posology13);
        $posology13 = new Posology();
        $posology13->setGemmotherapy($gemmo7); // Tilleul
        $posology13->setTreatment($traitement9); // Estomac
        $posology13->setDosage("7 gouttes au coucher");
        $manager->persist($posology13);
        $posology14 = new Posology();
        $posology14->setGemmotherapy($gemmo4); // Figuier
        $posology14->setTreatment($traitement10); // Ulcère
        $posology14->setDosage("5 à 7 gouttes un jour sur deux");
        $manager->persist($posology14);
        $posology15 = new Posology();
        $posology15->setGemmotherapy($gemmo1); // Aulne
        $posology15->setTreatment($traitement10); // Ulcère
        $posology15->setDosage("5 à 7 gouttes un jour sur deux");
        $manager->persist($posology15);

        $manager->flush();
    }
}
