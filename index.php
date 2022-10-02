<?php
  function createInput ($title, $title_handle, $type, $options = "", $onclick="", $placeholder="", $error="") {
    if ($type != "radio_group" && $type != "radio") { ?>
   
      <div class="mb-3" id="<?php echo $id ?>">
        <label for="<?php echo $title_handle ?>" class="title form-label"><?php echo $title ?></label><br>
      
        <input type="hidden" 
            name="<?php echo $title_handle ?>-label" 
            value="<?php echo $title ?>" >
        <input 
            type="<?php echo $type ?>" class="input form-control" 
            name="<?php echo $title_handle ?>"
            placeholder="<?php echo $placeholder ?>"
            required>


      </div>
      <?php
    } else {
      ?>
      <div class="mb-3" >
        <label><?php echo $title ?></p>
        <!-- <input type="hidden" name="<?php echo $title_handle ?>-label" value="<?php echo $title ?>"> -->

        <?php foreach ($options as $option) { ?>
          <label class="form-label"> <?php echo $option->title ?> </label>
          <input 
            type="<?php echo $option->type ?>"
            name="<?php echo $option->title_handle ?>" 
            value="<?php echo $option->title ?>"
            placeholder="<?php echo $option->placeholder ?>"
            required>
            

        <?php } ?>
      </div>
      <?php
    }
  }
?>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Formalités juridiques</title>
    <link rel="stylesheet" href="styles.css">

    <script type="text/javascript">
        function situation(x){
            if (x == 0) 
                document.getElementById('conjoint').style.display = 'block';
                else
                document.getElementById('conjoint').style.display = 'none';
        }
        function child(x){
            if (x == 0) 
                document.getElementById('children').style.display = 'block';
                else
                document.getElementById('children').style.display = 'none';
        }
        function create_champ(i) {
            var i2 = i + 1;
            document.getElementById('leschamps_'+i).innerHTML = '<input type="text" name="son['+i+']"></span>';
            document.getElementById('leschamps_'+i).innerHTML += (i <= 10) ? '<br /><span id="leschamps_'+i2+'"><a href="javascript:create_champ('+i2+')">Ajouter un enfant</a></span>' : '';
            }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto">
            <?php
              if(empty($_POST['valide'])) {
            ?>
            <form action="convert-pdf.php" method="post">
            <h2 class="text-center mt-5 mb-5"></h4>
            <h3><strong>INFORMATIONS</strong></h3>
            <h6 class="info text-left mt-5 mb-5"> Étape 1 : Votre identité et vos informations familiales</h4>
            
              <?php
                $inputs = array(
                  (object) [
                    'title' => 'Nom',
                    'handle' => 'name',
                    'type' => 'text',
                    'options' => "",
                    'onclick' => "",
                    'placeholder'=> "Votre nom",
                    'error'=> ""
                  ],
                  (object) [
                    'title' => 'Prenom',
                    'handle' => 'lastname',
                    'type' => 'text',
                    'options' => "",
                    'onclick' => "",
                    'placeholder'=> "Votre prénom",
                    'error'=> ""
                  ],
                  (object) [
                    'title' => 'Date de naissance',
                    'handle' => 'birthday',
                    'type' => 'date',
                    'options' => "",
                    'onclick' => "",
                    'placeholder'=> "",
                    'error'=> ""
                  ],
                  (object) [
                    'title' => 'Lieu de naissance',
                    'handle' => 'birthplace',
                    'type' => 'text',
                    'options' => "",
                    'onclick' => "",
                    'placeholder'=> "Votre ville de naissance",
                    'error'=> ""

                  ],
                  (object) [
                    'title' => 'Quelle est votre situation familiale ?',
                    'handle' => 'situation[]',
                    'type' => 'radio_group',
                    'options' => array(
                      (object) [
                        'title' => 'Celibataire',
                        'title_handle' => 'situation[]',
                        'type' => 'radio',
                        'onclick'=>'situation(1)',
                        'options' => "",
                        'placeholder'=> "",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Union de fait',
                        'title_handle' => 'situation[]',
                        'type' => 'radio',
                        'onclick'=>'situation(1)',
                        'options' => "",
                        'placeholder'=> "",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Divorcé',
                        'title_handle' => 'situation[]',
                        'type' => 'radio',
                        'onclick'=>'situation(1)',
                        'options' => "",
                        'placeholder'=> "",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Marie ou pacs',
                        'title_handle' => 'situation[]',
                        'type' => 'radio',
                        'onclick'=>'situation(0)',
                        'options' => "",
                        'placeholder'=> "",
                        'error'=> ""

                      ]
                      ),
                      'onclick' => "",
                      'placeholder'=> "",
                      'error'=> ""

                  ],
                  (object) [
                    'title' => 'Nom et prenom de votre conjoint :',
                    'handle' => 'conjoint',
                    'type' => 'text',
                    'options' => "",
                    'onclick' => "",
                    'placeholder'=> "Nom et prénom",
                    'error'=> ""

                  ]
                );

                foreach ($inputs as $input) {
                  createInput($input->title, $input->handle, $input->type, $input->options, $input->onclick, $input->placeholder);
                  //var_dump($input->options);
                }
              ?>
                          <h3><strong>ENFANTS</strong></h3>
            <h6 class="info text-left mt-5 mb-5"> Étape 2 : L'existence d'enfants</h6>

              <?php
                $inputs = array(
                    (object) [
                        'title' => 'Avez vous des enfants ?',
                        'handle' => 'child[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'child[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => 'child[0]',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'child[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => 'child[1]',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                          ),
                            'placeholder'=> "",
                            'error'=> ""
                      ],
                      (object) [
                        'title' => 'Nom et prenom de votre enfant',
                        'title_handle' => 'son',
                        'handle' => 'son',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Nom et prénom",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Souhaitez-vous nommer un administrateur des biens de vos enfants mineurs ? ',
                        'handle' => 'adminstrator[]',
                        'type' => 'radio_group',
                        'options' => array(
                          (object) [
                              'title' => 'Oui',
                              'title_handle' => 'admin[]',
                              'value' => 'adminstrator[]',
                              'type' => 'radio',
                              'options' => "",
                              'onclick' => "",
                              'placeholder'=> "",
                              'error'=> ""

                          ],
                          (object) [
                              'title' => 'Non',
                              'title_handle' => 'admin[]',
                              'value' => 'adminstrator[]',
                              'type' => 'radio',
                              'options' => "",
                              'onclick' => "",
                              'placeholder'=> "",
                              'error'=> ""

                          ]
                      ),
                        'onclick' => "",
                        'placeholder'=> "",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Souhaitez-vous nommer un tuteur pour vous enfants si les deux parents décedent ? ',
                        'handle' => 'tuteur[]',
                        'type' => 'radio_group',
                        'placeholder'=> "",
                        'options' => array(
                          (object) [
                              'title' => 'Oui',
                              'title_handle' => 'tuteur[]',
                              'value' => 'tuteur[]',
                              'type' => 'radio',
                              'options' => "",
                              'onclick' => "",
                              'placeholder'=> "",
                              'error'=> ""

                          ],
                          (object) [
                              'title' => 'Non',
                              'title_handle' => 'tuteur[]',
                              'value' => 'tuteur[]',
                              'type' => 'radio',
                              'options' => "",
                              'onclick' => "",
                              'placeholder'=> "",
                              'error'=> ""

                          ]
                      ),
                        'onclick' => "",
                        'placeholder'=> "",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Nom et prenom du tuteur designe',
                        'title_handle' => 'tuteurName',
                        'handle' => 'tuteurName',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Nom et prénom",
                        'error'=> ""

                      ],
                      
                );
                foreach ($inputs as $input) {
                  createInput($input->title, $input->handle, $input->type, $input->options, $input->onclick, $input->placeholder);
                  //var_dump($input->options[0]->onclick);
                }
              ?>
              
              <h3><strong>TESTAMENT</strong> </h3>
              <h6 class="info text-left mt-5 mb-5">Étape 3 : L'existence d'un testament ou d'une donation</h6>

              <?php
                $inputs = array(
                    (object) [
                        'title' => 'Avez-vous déjà rédigé un testament ?',
                        'handle' => 'testament[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'testament[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'testament[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Souhaitez-vous que ce nouveau testament révoque ce que vous avez déjà prévu ?',
                        'handle' => 'nTestament[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'nTestament[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'nTestament[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Avez-vous déjà consenti une donation  entre époux ?',
                        'handle' => 'donation[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'donation[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'donation[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Nom et prenom du notaire',
                        'title_handle' => 'nameNotaire',
                        'handle' => 'nameNotaire',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder' => "Nom et prénom du notaire",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Lieu d exercice du notaire',
                        'title_handle' => 'lieuNotaire',
                        'handle' => 'lieuNotaire',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Lieu d exercice du notaire",
                        'error'=> ""
                        
                      ],
                      (object) [
                        'title' => 'Date de la donation',
                        'title_handle' => 'dateNotation',
                        'handle' => 'dateNotation',
                        'type' => 'date',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "",
                        'error'=> ""
                      ],
    
                );
                /*  <input type="radio" name="child[]" value="Oui" onclick="child(0)" checked>Oui */
                foreach ($inputs as $input) {
                  createInput($input->title, $input->handle, $input->type, $input->options, $input->onclick, $input->placeholder);
                  //var_dump($input->options[0]->onclick);
                }
              ?>

            <h3><strong>DESIGNATION</strong></h3>
            <h6 class="info text-left mt-5 mb-5"> Étape 4 : Désignation d'une exécuteur testamentaire</h6>
            <?php
                $inputs = array(
                    (object) [
                        'title' => 'Souhaitez-vous désigner une personne qui veillera à la bonne exécution du testament ?',
                        'handle' => 'executeur[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'executeur[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'executeur[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Nom et prenom de l executeur',
                        'title_handle' => 'nameExecuteur',
                        'handle' => 'nameExecuteur',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder' => "Nom et prénom",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Ville',
                        'title_handle' => 'lieuExecuteur',
                        'handle' => 'lieuExecuteur',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Nom de la ville",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Souhaitez-vous désigner un exécuteur alternatif ?',
                        'handle' => 'executeurAlternatif[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'executeurAlternatif[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'executeurAlternatif[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Nom et prenom de l executeur Alternatif',
                        'title_handle' => 'executAltern',
                        'handle' => 'executAltern',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder' => "Nom et prénom",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Ville',
                        'title_handle' => 'lieuExecuteur',
                        'handle' => 'lieuExecuteur',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Nom de la ville",
                        'error'=> ""

                      ],
                );
                /*  <input type="radio" name="child[]" value="Oui" onclick="child(0)" checked>Oui */
                foreach ($inputs as $input) {
                  createInput($input->title, $input->handle, $input->type, $input->options, $input->onclick, $input->placeholder);
                  //var_dump($input->options[0]->onclick);
                }
              ?>


            <h3><strong>DISPOSITIONS</strong></h3>
            <h6  class="info text-left mt-5 mb-5"> Étape 5 : Dispositions que vous souhaitez prendre</h6>
           
           <?php
                $inputs = array(
                    (object) [
                        'title' => 'Voulez-vous précisez des legs à titre particulier dans votre testament ?',
                        'handle' => 'legsParticulier[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'legsParticulier[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'legsParticulier[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Voulez-vous précisez des legs à un organisme de bienfaisance ?',
                        'handle' => 'legsOrganisme[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'legsOrganisme[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'legsOrganisme[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Souhaitez-vous que votre conjoint hérite les biens que vous avez laissé sans en avoir disposé ou à l’égard desquels les dispositions sont privées ?',
                        'handle' => 'conjointHerite[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'conjointHerite[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'conjointHerite[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Souhaitez-vous déshériter quelqu’un ?',
                        'handle' => 'desheriterQuelqun[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'desheriterQuelqun[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'desheriterQuelqun[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Nom et prenom',
                        'title_handle' => 'legFirstNameLastname',
                        'handle' => 'legDesignation',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Nom et prénom",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Designation du leg',
                        'title_handle' => 'descriptionLeg',
                        'handle' => 'descriptionLeg',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Designer leg",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Voulez-vous précisez des legs à un organisme de bienfaisance ?',
                        'handle' => 'legsOrganismeBienfaisance[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'legsOrganismeBienfaisance[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'legsOrganismeBienfaisance[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""
                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Denomination/nom de l’organisme de bienfaisance',
                        'title_handle' => 'denominationName',
                        'handle' => 'denominationName',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Nom de l’organisme de bienfaisance",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Numero d enregistrement',
                        'title_handle' => 'denominationNumber',
                        'handle' => 'denominationNumber',
                        'type' => 'number',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "000000000000000",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Description du leg',
                        'title_handle' => 'denominationDescription',
                        'handle' => 'denominationDescription',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Chèque de 500€",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Ville du leg',
                        'title_handle' => 'denominationVille',
                        'handle' => 'denominationVille',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Chèque de 500€",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Souhaitez-vous que votre conjoint hérite les biens que vous 
                                    avez laissé sans en avoir disposé ou à l’égard desquels les dispositions sont privées ?',
                        'handle' => 'conjointHeritierBiens[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'conjointHeritierBiens[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'conjointHeritierBiens[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""
                            ],
                        )
                      ],
                         (object) [
                        'title' => 'Nom et prénom',
                        'handle' => 'denominationHeritier',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Votre nom et prénom",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Ville de l heritier',
                        'title_handle' => 'villeHeritier',
                        'handle' => 'villeHeritier',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Ville",
                        'error'=> ""

                      ],
                      (object) [
                        'title' => 'Souhaitez-vous desheriter quelqu’un ?',
                        'handle' => 'desheriterQuelqunB[]',
                        'type' => 'radio_group',
                        'onclick' => "",
                        'placeholder'=> "",
                        'options' => array(
                            (object) [
                                'title'=> 'Oui',
                                'title_handle' => 'desheriterQuelqunB[]',
                                'value' => 'Oui',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                            (object) [
                                'title' => 'Non',
                                'title_handle' => 'desheriterQuelqunB[]',
                                'value' => 'Non',
                                'type' => 'radio',
                                'options' => "",
                                'onclick' => '',
                                'placeholder'=> "",
                                'error'=> ""

                            ],
                        )
                      ],
                      (object) [
                        'title' => 'Nom et prenom du desheriter',
                        'title_handle' => 'desheriterName',
                        'handle' => 'desheriterName',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Nom et prenom",
                        'error'=> ""

                      ],
                );

                /*  <input type="radio" name="child[]" value="Oui" onclick="child(0)" checked>Oui */
                foreach ($inputs as $input) {
                  createInput($input->title, $input->handle, $input->type, $input->options, $input->onclick, $input->placeholder);
                  //var_dump($input->options[0]->onclick);
                }
              ?>


            <h3><strong>SIGNATURE</strong></h3>
            <h6 class="info text-left mt-5 mb-5"> Étape 6 : Date et lieu de la signature</h6>
            
            <?php
                $inputs = array(
                      (object) [
                        'title' => 'Lieu de la signature',
                        'title_handle' => 'lieuSignature',
                        'handle' => 'lieuSignature',
                        'type' => 'text',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "Lieu de la signautre",
                        'error'=> ""
                      ],
                      (object) [
                        'title' => 'Date de la signature',
                        'title_handle' => 'dateSignature',
                        'handle' => 'dateSignature',
                        'type' => 'date',
                        'options' => "",
                        'onclick' => "",
                        'placeholder'=> "",
                        'error'=> ""
                      ],
    
                );
                /*  <input type="radio" name="child[]" value="Oui" onclick="child(0)" checked>Oui */
                foreach ($inputs as $input) {
                  createInput($input->title, $input->handle, $input->type, $input->options, $input->onclick, $input->placeholder);
                  //var_dump($input->options[0]->onclick);
                }
              ?>


              <div class="mb-3"><br>
                <button type="submit" class="dowloand btn btn-primary mb-3"><span class="dowloand-text">Télécharger</span></button>
              </div>
            </form>
            <?php
            } else {
              echo 'Voila le résultat du formulaire<br/>';
              var_dump($_POST);
              echo '<br/>et voila le résultat des champs en affichage<br/>';
              foreach($_POST['son'] as $value)
              {
                echo $value.'<br/>';
              }
            }
            ?>
        </div>
      </div>        
    </div>
  </body>
</html>
