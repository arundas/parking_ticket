@include('includes.header')
    <section class="header-section">
      <div class="center-div">
      <h1 class="font-weight-bold">Locations</h1>
      <div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          foreach($locations as $data){
        ?>
        <tr>
            <td><?= $data->name; ?></td>
            <td><?= ($data->status=1) ? "Active" : "InActive"; ?></td>
        </tr>
        <?php } ?>
        <tbody>
    </table>
</div>
      </div>
    </section>
  </div>

  @include('includes.footer')