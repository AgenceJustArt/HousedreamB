<div class="sixteen columns">
  <div id="tabs">
    <ul>
      <li><a href="#tabs-1">Créer mon profil</a></li>
      <li><a href="#tabs-2">À propos de moi</a></li>
      <li><a href="#tabs-3">Mes attentes</a></li>
      <li><a href="#tabs-4">Télécarger ma photo / mon avatar</a></li>
    </ul>
    <?php echo $this->Form->create('User'); ?>

    <div id="tabs-1" class="block">
      <h2>Vos informations personnelles</h2>
      <?php echo $this->Form->input('firstname'); ?>
      <?php echo $this->Form->input('lastname'); ?>
      <?php echo $this->Form->input('pseudo'); ?>
      <?php echo $this->Form->input('mail'); ?>
      <?php echo $this->Form->input('mailComfirm'); ?>
      <?php echo $this->Form->input('pwd'); ?>
      <?php echo $this->Form->input('pwdComfirm'); ?>
      <?php echo $this->Form->input('born'); ?>
      <?php echo $this->Form->input('sex'); ?>
      <?php echo $this->Form->input('address'); ?>
      <?php echo $this->Form->input('cp'); ?>
      <?php echo $this->Form->input('country'); ?>
    </div>
    <div id="tabs-2" class="block">
      <h2>Ma situations (ce que je vis)</h2>
      <?php foreach($category as $k=>$v){
        echo $this->Form->checkbox('cat-'.$k, array('value' => $k)).' '.$v;
      }?>
      <h2>Les raisons de mon inscription, les circonstances</h2>
      <?php echo $this->Form->textarea('content'); ?>
      
    </div>
    <div id="tabs-3" class="block">
      <h2>ce que je recherche, ce que j'attends</h2>
      <?php echo $this->Form->textarea('search'); ?>
      <h2>Dialoguer avec</h2>
      <?php $options = array('1'=>'des personnes dans la même situation','2'=>'peu importe'); ?>
      <?php echo $this->Form->select('echange',$options); ?>
    </div>
    <div id="tabs-4" class="block">
      <h2>Votre photo / avatar</h2>
      <div class="avatar">

      </div>
      <?php echo $this->Form->checkbox('authPub', array('value' => '1')).' J\'accepte de recevoir les informations / offres promotionnelles de Sympathy World et de ses partenaires'; ?><br>
      <?php echo $this->Form->checkbox('authCGDV', array('value' => '1')).' J\'accepte les '.$this->Html->link('conditions générales d\'utilisation',array()); ?><br>
      <?php echo $this->Form->checkbox('authAge', array('value' => '1')).' Je certifie sur l\'honneur avoir plus de 18 ans'; ?>
      <?php echo $this->Form->end('Validation'); ?>
    </div>


  </div>
</div>
<script>
$(function() {
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  });
</script>