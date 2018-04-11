<section class="content-header">
    <h1>
    Links
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title">View <?= h($link->name) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
        <tr>
          
        </tr>
        <tr>
          <th><?= __('Name') ?></th>
          <td><?= h($link->name) ?></td>
        </tr>
        <tr>
          <th><?= __('Link') ?></th>
          <td><?= h($link->link) ?></td>
        </tr>
        <tr>
          <th><?= __('Icon') ?></th>
          <td><?= h($link->icon) ?></td>
        </tr>
        <tr>
          <th><?= __('Background Color') ?></th>
          <td>
          <?= h($link->background) ?>
          <div style="height:20px; width:20px; background:<?= h($link->background) ?>;"></div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       