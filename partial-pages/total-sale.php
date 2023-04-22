<div class="result">
  <div class="row">
    <div class="col-sm-4">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Total Sale</h5>
          <p class="card-text">$<?php echo number_format($total_sale, 2); ?></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Gross Profit</h5>
          <p class="card-text">$<?php echo number_format($gross_profit, 2); ?></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Net Income</h5>
          <p class="card-text">$<?php echo number_format($net_income, 2); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>