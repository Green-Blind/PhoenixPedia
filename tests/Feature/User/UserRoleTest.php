<?php

// Spécifiez l'espace de noms où se trouve notre classe de test.
// Cela correspond à l'organisation de nos dossiers.
namespace Tests\Feature\User;

// Importez les classes nécessaires pour notre test.
use App\Models\User; // Le modèle utilisateur que nous allons tester.
use Illuminate\Foundation\Testing\RefreshDatabase; // C'est un trait fourni par Laravel qui nous permet de réinitialiser l'état de la base de données après chaque test.
use Tests\TestCase; // C'est la classe de base pour tous les tests dans Laravel.

// Notre classe de test qui hérite de TestCase, nous donnant accès à diverses méthodes d'assertion.
class UserRoleTest extends TestCase
{
    // On utilise le trait RefreshDatabase pour s'assurer qu'aucun état de la base de données ne persiste entre les tests.
    use RefreshDatabase;

    // Notre méthode de test. Dans Laravel, chaque méthode publique dans une classe de test est une "procédure de test", signifiant qu'elle sera exécutée lorsque nous lançons nos tests.
    public function test_user_can_have_roles()
    {
        // Créez un nouvel utilisateur à l'aide de la factory d'utilisateurs.
        // Les factories sont un moyen de créer des instances de modèles pour les tests.
        $user = User::factory()->create();

        // Ici, nous supposons que nous avons une méthode sur notre modèle utilisateur appelée "giveRole"
        // qui attribue un rôle à l'utilisateur. Ceci est fictif pour l'instant et doit être implémenté.
        $user->giveRole('admin');

        // Nous vérifions ensuite que l'utilisateur a bien reçu le rôle.
        // Encore une fois, nous supposons que nous avons une méthode "hasRole" pour cela.
        // C'est là que notre test échouerait si nous n'avons pas encore mis en œuvre ces méthodes.
        $this->assertTrue($user->hasRole('admin'));
    }
}
