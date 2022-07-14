<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Etudiant');
RequirePage::requireModel('Enseignant');
RequirePage::requireModel('Groupe');
RequirePage::requireModel('Cours');
RequirePage::requireLibrary('Validation');

class ControllerEtudiant{

    public function index(){
      return Twig::render('etudiant-index.php');
    }

    public function list(){
      $etudiant = new ModelEtudiant;
      $selectEtudiant = $etudiant->select();

      $enseignant = new ModelEnseignant;
      $selectEnseignant = $enseignant->select();

      $cours = new ModelCours;
      $selectCours = $cours->selectCours("cours", "titre");
      
      return Twig::render('etudiant-list.php', ['etudiants' => $selectEtudiant, 'enseignants' => $selectEnseignant, 'courss' => $selectCours]);
    }


    public function create(){

      $groupes = new ModelGroupe;
      $selectGroupes = $groupes->select('nom');
      return Twig::render('etudiant-insert.php', ['groupes' => $selectGroupes]);

    }

    public function store() {
      $validation = new Validation;
      extract($_POST);
      $validation->name('prenom')->value($prenom)->pattern('alpha')->required()->max(30);
      $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
      $validation->name('phone')->value($phone)->pattern('tel')->max(20);
      $validation->name('courriel')->value($courriel)->pattern('email')->max(110);
      $validation->name('groupe_idgroupe')->value($groupe_idgroupe)->pattern('int')->max(11);
      
      if($validation->isSuccess()){
        $etudiant = new ModelEtudiant;
        $insert = $etudiant->insert($_POST);
        RequirePage::redirect('etudiant/list');  

      }else{
       // var_dump($validation->getErrors());
         $errors =  $validation->displayErrors();

         $groupes = new ModelGroupe;
         $groupes = $groupes->select('nom');

        // return Twig::render('etudiant-insert.php', ['errors' => $errors, 'villes'=> $villes, 'etudiant' => $_POST]);
        return Twig::render('etudiant-insert.php', ['errors' => $errors, 'groupes'=>$groupes, 'etudiant' => $_POST]);
      }

    }

    public function edit($value){
      $etudiant = new ModelEtudiant;
      $selectId = $etudiant->selectId($value);

      $groupe = new ModelGroupe;
      $groupes = $groupe->select('nom');
      
      return Twig::render('etudiant-edit.php', ['etudiant' => $selectId, 'groupes' => $groupes]);
    }
   

    public function update(){
 
      $validation = new Validation;
      extract($_POST);
      $validation->name('prenom')->value($prenom)->pattern('alpha')->required()->max(30);
      $validation->name('nom')->value($nom)->pattern('alpha')->required()->max(30);
      $validation->name('phone')->value($phone)->pattern('tel')->max(20);
      $validation->name('courriel')->value($courriel)->pattern('email')->max(110);
      $validation->name('groupe_idgroupe')->value($groupe_idgroupe)->pattern('int')->max(11);

      if($validation->isSuccess()){
        $etudiant = new ModelEtudiant;
        $update = $etudiant->update($_POST, 1);

        // print_r($update);
        // die();
        
        RequirePage::redirect('etudiant/list');  

      }else{
      //  var_dump($validation->getErrors());
        $errors =  $validation->displayErrors();

        $groupes = new ModelGroupe;
        $groupes = $groupes->select('nom');
        
        return Twig::render('etudiant-insert.php', ['errors' => $errors, 'groupes'=>$groupes, 'etudiant' => $_POST]);
      }
    }

    public function delete(){
      $etudiant = new ModelEtudiant;
      $delete = $etudiant->delete($_POST);
      RequirePage::redirect('etudiant/list');
    }
}


//  domain.com/controller/method/value
//              URL[0]    [1]    [2]



