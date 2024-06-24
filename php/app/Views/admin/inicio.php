<div class="col-12">
    
<div class="row">
    
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center">
                <i class="fa fa-users primary font-large-2 float-left" style="font-size: 33px;"></i>
              </div>
              <div class="media-body text-right" style="width: 100%;">
                <h3><?=$contador['data'][0]['cli'];?></h3>
                <span>Customers</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center">
                <i class="fa fa-cube primary font-large-2 float-left" style="font-size: 33px;"></i>
              </div>
              <div class="media-body text-right" style="width: 100%;">
                <h3><?=$contador['data'][0]['plan'];?></h3>
                <span>Diets</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center">
                <i class="fa fa-book primary font-large-2 float-left" style="font-size: 33px;"></i>
              </div>
              <div class="media-body text-right" style="width: 100%;">
                <h3><?=$contador['data'][0]['rec'];?></h3>
                <span>Recipes</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="align-self-center">
                <i class="fa fa-usd primary font-large-2 float-left" style="font-size: 33px;"></i>
              </div>
              <div class="media-body text-right" style="width: 100%;">
                <h3><?php if($contador['data'][0]['gan']==""){echo 0; }else{ echo $contador['data'][0]['gan']/100; }?></h3>
                <span>Earnings this month</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</div>
  
</div>

<div class="row mb-2 mb-xl-3">
	<div class="col-auto d-none d-sm-block">
		<h3 id="titulo"><strong>Online customers</strong></h3>
	</div>

</div>
					