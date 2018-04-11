<section class="content-header">
    <h1>
    Trainers
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Trainers</li>
    </ol>
</section>
<?php //print_r($trainers); ?>
<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        <?= $this->Flash->render() ?>
        
        <div class="box">
            <!--<div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Reviews</th>
                  <th>Average Rating</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($trainers as $trainer): ?>
                <tr>
                  <td><?php echo $trainer['id']; ?></td>
                  <td><?php echo $trainer['name']; ?></td>
                  <td><?php echo count($trainer['reviews']); ?></td>
                  <td>
                  <?php if($trainer['avg_rating'] <= 2){
                  	echo '<span class="label label-danger">'.$trainer['avg_rating'].'  <i class="fa fa-star" aria-hidden="true"></i></span>';
                  }elseif($trainer['avg_rating'] > 2 && $trainer['avg_rating'] < 4){
                  	echo '<span class="label label-warning">'.$trainer['avg_rating'].'  <i class="fa fa-star" aria-hidden="true"></i></span>';
                  }elseif($trainer['avg_rating'] >= 4){
                  	echo '<span class="label label-success">'.$trainer['avg_rating'].'  <i class="fa fa-star" aria-hidden="true"></i></span>';
                  } ?>
                  </td>
                  <td>
                    <?= $this->Html->link(
                        '<span class="fa fa-eye"></span><span class="sr-only">' . __('View Reviews') . '</span>',
                        ['action' => 'reviews', $trainer['id']],
                        ['escape' => false, 'title' => __('View Reviews'), 'class' => 'btn btn-info']
                    ) ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Reviews</th>
                  <th>Average Rating</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        
        
        
        </div>
    </div>
</section>       