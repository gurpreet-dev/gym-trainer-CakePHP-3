<section class="content-header">
    <h1>
    Homepage Section
    <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">$homesection->title</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-xs-12">
        
        
        <div class="box">
  <div class="box-header">
    <h3 class="box-title"><?= h($homesection->title) ?></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($homesection->id) ?></td>
        </tr>
        <tr>
          <th><?= __('Title') ?></th>
          <td><?= h($homesection->title) ?></td>
        </tr>
        <tr>
          <th><?= __('Content') ?></th>
          <td><?= html_entity_decode($homesection->content, ENT_QUOTES, "UTF-8"); ?></td>
        </tr>
        <tr>
          <th><?= __('Sort Order') ?></th>
          <td><?= h($homesection->sort_order) ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>

        
        
        
        </div>
    </div>
</section>       