<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <link rel="stylesheet" href="{{path}}assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header">
        <div class="container flex">
            <div class="header__text">
                <h1>Conception et Programmation de Site web</h1>
                <h3>par Jaeri Park</h3>
            </div>
            <div class="header__img">
                <img src="{{path}}assets/img/codinggirl.svg" alt="a girl working on a laptop" class="header__image">
            </div>
        </div>
    </header>

    <div class="list etudiant__list">
        <div class="px">
            <div class="container">
                <div class="list__title flex">
                    <h1>Etudiant</h1>
                    <a href="{{path}}etudiant/create" class="etudiant__create--link"><span class="etudiant__create--text">CREATE</span><i class="fa-solid fa-user-plus"></i></a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Phone</th>
                            <th>Courriel</th>
                            <th>Groupe</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for etudiant in etudiants %}
                        <tr>
                            <td>{{ etudiant.prenom }}</td>
                            <td>{{ etudiant.nom }}</td>
                            <td>{{ etudiant.phone }}</td>
                            <td>{{ etudiant.courriel }}</td>
                            <td>{{ etudiant.groupe_idgroupe }}</td>
                            <td><a href="{{path}}etudiant/edit/{{etudiant.idetudiant}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="list enseignant__list">
        <div class="px">
            <div class="container">
                <div class="list__title flex">
                    <h1>Enseignant</h1>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Phone</th>
                            <th>Courriel</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for enseignant in enseignants %}
                        <tr>
                            <td>{{ enseignant.prenom }}</td>
                            <td>{{ enseignant.nom }}</td>
                            <td>{{ enseignant.phone }}</td>
                            <td>{{ enseignant.courriel }}</td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="list cours__list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Cours</h1>
                <table>
                    <thead>
                        <tr>
                            <th class="cours__title">Titre</th>
                            <th class="cours__desc">Description</th>
                            <th>Enseignant</th>
                            <th>Groupe</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for cours in courss %}
                        <tr>
                            <td>{{ cours.titre }}</td>
                            <td>{{ cours.description }}</td>
                            <td>{{ cours.enseignant }}</td>
                            <td>{{ cours.groupe }}</td>
                        </tr>
                        {% endfor %}
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>
</html>