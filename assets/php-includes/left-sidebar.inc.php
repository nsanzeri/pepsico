            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <img src="assets/images/logo_pepsico.png" alt="Logo" >
                        <br><br><br>
                        <h3>GLOBAL PACKAGING <span style="color: #03a9f4">DATABASE</span></h3>
                        <h2>Search the globe for different structures, sizes & more</h2>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><span> <div id="all-clear">clear all x</div> </span> </a>
                            </li>
                        	<li class="search">
                                <div class="floating-box-search"><input id="autocomplete" type="text" class="form-control search-bar" placeholder="Search"></div>
                                <div class="floating-box-search-icon"><img id="search-icon" src="assets/images/search.png" alt="search" ></div>
                            </li>     
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-earth"></i> <span> Region </span> <span class="pull-right"><div class="gp-clearall" id="region-clear">clear all x</div></i></span></a>
                       				<?php echo buildFilter ( 'region', 'region_id' ); ?>        
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-panorama-vertical"></i> <span> Format </span> <span class="pull-right"><div class="gp-clearall" id="format-clear">clear all x</div></i></span></a>
									<?php echo buildFilter ( 'format', 'format_id' ); ?>                                  
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-copyright"></i><span> Brand </span><span class="pull-right"><div class="gp-clearall" id="brand-clear">clear all x</div></span></a>
									<?php echo buildFilter ( 'brand', 'brand_id' ); ?>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-crop"></i><span> Size </span><span class="pull-right"><div class="gp-clearall" id="size-clear">clear all x</div></i></span></a>
									<?php echo buildFilter ( 'size', 'size_id' ); ?>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i><span> Finish </span><span class="pull-right"><div class="gp-clearall" id="finish-clear">clear all x</div></i></span></a>
									<?php echo buildFilter ( 'finish', 'finish_id' ); ?>                                
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            