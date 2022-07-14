<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New Etudiant</title>
      <link rel="stylesheet" href="{{path}}assets/css/style.css">
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

    <div class="list">
        <div class="px">
            <div class="container">
                  <h1 class="list__title">New Etudiant</h1>
                  {% if errors is defined %}
                        <span class="error">{{ errors|raw }}</span>
                  {% endif %}

                  <form action="{{path}}etudiant/store" method="post" class="form__create">
                    <div class="form__nomComplet flex">
                        <div class="form__prenom">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" value="{{ etudiant.prenom }}">
                        </div>

                        <div class="form__nom">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" value="{{ etudiant.nom }}">
                        </div>
                    </div>

                    <div class="form__contact flex">
                        <div class="form__phone">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ etudiant.phone }}">
                        </div>

                        <div class="form__courriel">
                            <label for="courriel">Courriel</label>
                            <input type="text" id="courriel" name="courriel" value="{{ etudiant.courriel }}">
                        </div>
                    </div>

                    <div class="form__groupeSubmit flex">
                        <div class="form__groupe">
                              <label for="groupe_idgroupe">Groupe</label>
                              <select name="groupe_idgroupe" id="groupe_idgroupe" class="form__select">
                                    {% for groupe in groupes %}
                                    <option value="{{ groupe.idgroupe }}" {% if groupe.idgroupe==etudiant.groupe_idgroupe %} selected {% endif %}>{{ groupe.nom }}</option>
                                    {% endfor %}
                              </select>
                        </div>

                        <div>
                            <input class="form__submit" type="submit">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>