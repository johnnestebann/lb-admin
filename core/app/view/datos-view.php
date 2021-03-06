<section class="content">
<?php
/*
 * Obtengo solo los datos del barrio del secretario o toda la estaca
 */
if (Core::$user->kind == 1)
    $data["posts"] = Fecha::getAll();
else
    $data["posts"] = Fecha::getAllBySecretario($_SESSION["user_id"]);
?>
                <!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
                            Datos - <?=Unidad::getById(Core::$user->unidad)->nombre;?>
                        </h1>
			<ol class="breadcrumb">
				<li class=""><a href="./?view=index"><i class="fa fa-dashboard"></i>
						Panel</a></li>
				<li class="active"><i class="fa fa-calendar"></i> Datos</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-lg-12">
			<a href="./?view=newdato" class="btn btn-default">Agregar</a><br>
			<br>
			<div class="box box-primary">
				<div class="box-body">
					<table
						class="table datatable table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Asist. Sacramental</th>
								<th>Asist. Sacerdocio</th>
								<th>Rec. Activas</th>
								<th>Rec. Vencidas</th>
								<th>Consejo</th>
								<th>Comite</th>
								<th>Orientacion Familiar</th>
								<th>Maestras Visitantes</th>
								<th>Bautismos</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
                                        <?php foreach($data["posts"] as $post):?>
                                            <tr>
								<td><?=$post->fecha;?></td>
								<td><?=$post->asist_sacr;?></td>
								<td><?=$post->asist_melq;?></td>
								<td><?=$post->rec_activas;?></td>
								<td><?=$post->rec_vencidas;?></td>
								<td>
                                                <?php
                                            if ($post->consejo == 0)
                                                echo 'NO';
                                            else
                                                echo 'SI';
                                            ?>
                                                </td>
								<td>
                                                <?php
                                            if ($post->comite == 0)
                                                echo 'NO';
                                            else
                                                echo 'SI';
                                            ?>
                                                </td>
								<td><?=$post->orientacion;?></td>
								<td><?=$post->visitas;?></td>
								<td><?=$post->bautismos;?></td>
								<td style="width: 70px;"><a
									href="./?view=viewdatos&id=<?=$post->id;?>"
									class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a> <a
									href="./?view=editdatos&id=<?=$post->id;?>"
									class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
									<a href="./?action=deldato&id=<?=$post->id;?>"
									class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
								</td>
							</tr>
                                        <?php endforeach;?>
                                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</section>