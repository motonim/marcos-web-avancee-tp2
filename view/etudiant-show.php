<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Etudiant</title>
      <link rel="stylesheet" href="{{path}}assets/css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
      <h2>Visualiser l'étudiant</h2>
      <p><strong>Prenom : </strong>{{ etudiant.prenom }}</p>
      <p><strong>Nom : </strong>{{ etudiant.nom }}</p>
      <p><strong>Phone : </strong>{{ etudiant.phone }}</p>
      <p><strong>Courriel : </strong>{{ etudiant.courriel }}</p>
      <p><strong>Groupe : </strong>{{ etudiant.groupe_idgroupe }}</p>
      <p><strong><a href="{{path}}etudiant/edit/{{etudiant.idetudiant}}">Modifier</a></p>
</body>
</html>