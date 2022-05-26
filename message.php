<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container">
    <p>Votre inscription à l'école de conduite a été soumise avec succès et vous confirmera dès que nous verrons votre demande.
    <?php if(isset($_GET['reg_no'])): ?>
        Votre numéro d'enregistrement est <b><?= $_GET['reg_no'] ?></b>.
    <?php endif; ?>
    Merci!</p>
    <div class="text-right">
        <button class="btn btn-sm btn-flat btn-dark" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
    </div>
</div>