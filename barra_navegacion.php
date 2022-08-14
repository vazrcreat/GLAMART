	<?php
        if (isset($title)) {
            ?>
<nav class="navbar navbar-default header" style="border-radius: 0;margin-bottom: 0;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="principal.php">GLAMART | Transacciones</a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo $active_facturas; ?>"><a href="facturas.php"><i class='glyphicon glyphicon-list-alt'></i> Carrito <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_productos; ?>"><a href="inventario.php"><i class='glyphicon glyphicon-barcode'></i> Catalogo</a></li>
		<li class="<?php echo $active_clientes; ?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes</a></li>
		<li class="<?php echo $active_usuarios; ?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
    <li class="<?php echo $active_pedidos; ?>"><a href="pedidos.php"><i  class='glyphicon glyphicon-list'></i> Pedidos</a></li>
    <li class="<?php?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-file'></i> Reportes</a></li>

       </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
	<?php
        }
    ?>