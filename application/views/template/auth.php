<?php $this->view('template/header'); ?>

<body class="bg-gradient-primary">
    <?= $this->alert->get(); ?>

    <?= $contents; ?>


    <?php $this->view('template/footer'); ?>
</body>

</html>