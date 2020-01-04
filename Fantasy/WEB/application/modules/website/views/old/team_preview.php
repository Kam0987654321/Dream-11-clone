 <div class="team-preview-page js--team-preview desktopTeamPreviewContainer_61fb1">
          <div class="content_60710" style="background-image: url('<?php echo base_url('uploads/ground.png') ?>');">
            <div>
            <div class="toolbar_650b2">
              <div class="align-center">
                <div class="toolbarElementMain_7948b toolbarElementLeft_19260">
                  <div class="toolbar-title"><?php echo $userinfo['referral_code'] ?> (T1)</div>
                </div>
                <div>                  
                </div>
                <div class="toolbarElementMain_7948b toolbarElementRight_c98d9 toolbarElementIcon_3d48d">
                </div>
              </div>
            </div>
          </div>
          <div class="playerArea_eac11">
            <div>
              <div class="spaceAround_64779 tall_56497">
                <div class="teamPreviewRowWrapper_0c54c">
                  <div class="rowTitle_b91f3">Wicket-Keeper</div>
                  <div class="spaceAround_64779 rowContent_8aa5f">
                    <div class="spaceAround_64779 rowContent_8aa5f">
                      <div class="js--field-player fieldPlayerMain_32975">
                        <div>
                          <div class="playerImageProfile_0cc1f">
                               <?php $team1= $match_details['teamid1'];
                      $team2 = $match_details['teamid2'];?>  
                            <?php
                      $img = $this->Website_model->get_image($keeper[0]['designationid']);
                        $where = array('id'=>$keeper[0]['player_id']);
                        $table = 'players';
                      $keep =  $this->Website_model->get_where($where,$table);
                      if($team1 != $keeper[0]['teamid']){
                                  $style = "background-color: rgb(55, 89, 165);";
                                }else{
                                  $style = "background-color: rgb(196, 63, 45);";
                                }?>
                          <!-- <img class="player-image-profile__role" src="./teamlist_files/ViceCaptain_Default.svg" style="background-color: rgb(74, 144, 226);"> -->
                          <div class="imageProfileContainer_6e52e">
                            <div class="player-image-profile__image" style="background-image: url('<?php echo base_url('uploads/player/'.$img['image'])?>');">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="fieldPlayerTitle_4ac32" style="<?php echo $style; ?>"><?php echo $keep['name'];?></div>
                      <div class="playerPoints_d4e06"><?php echo $keep['credit_points']; ?> Cr</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="teamPreviewRowWrapper_0c54c">
                <div class="rowTitle_b91f3">Batsmen</div>
                <div class="spaceAround_64779 rowContent_8aa5f">
                  
                  <?php foreach ($bats as $bat) {
                    $where = array('id'=>$bat['player_id']);
                        $table = 'players';
                      $batm =  $this->Website_model->get_where($where,$table);
                      $img = $this->Website_model->get_image($bat['designationid']);
                        if($team1 != $bat['teamid']){
                                  $style = "background-color: rgb(55, 89, 165);";
                                }else{
                                  $style = "background-color: rgb(196, 63, 45);";
                                }
                    ?>
                      <div class="spaceAround_64779 rowContent_8aa5f">
                    <div class="js--field-player fieldPlayerMain_32975">
                      <div>
                      <div class="playerImageProfile_0cc1f">
                        <div class="imageProfileContainer_6e52e">
                          <div class="player-image-profile__image" style="background-image: url('<?php echo base_url('uploads/player/'.$img['image'])?>');"></div></div></div>
                        </div>
                        <div class="fieldPlayerTitle_4ac32" style="<?php echo $style; ?>"><?php echo $batm['name']; ?></div>
                        <div class="playerPoints_d4e06"><?php echo $batm['credit_points']; ?> Cr</div>
                      </div>
                    </div>
                    <?php 
                  } ?>
                    
                 
                  </div>
                </div>
                    <div class="teamPreviewRowWrapper_0c54c">
                      <div class="rowTitle_b91f3">All-Rounders</div>
                    <div class="spaceAround_64779 rowContent_8aa5f">
                      <?php foreach ($allrounds as $allround) {
                        $where = array('id'=>$allround['player_id']);
                        $table = 'players';
                      $all =  $this->Website_model->get_where($where,$table);
                      $img = $this->Website_model->get_image($allround['designationid']);
                       if($team1 != $allround['teamid']){
                                  $style = "background-color: rgb(55, 89, 165);";
                                }else{
                                  $style = "background-color: rgb(196, 63, 45);";
                                }
                        ?>
                          <div class="spaceAround_64779 rowContent_8aa5f">
                      <div class="js--field-player fieldPlayerMain_32975">
                        <div>
                        <div class="playerImageProfile_0cc1f">
                          <div class="imageProfileContainer_6e52e">
                          <div class="player-image-profile__image" style="background-image: url('<?php echo base_url('uploads/player/'.$img['image'])?>');">
                          </div>
                        </div>
                      </div>
                      </div>
                        <div class="fieldPlayerTitle_4ac32" style="<?php echo $style; ?>"><?php echo $all['name']; ?></div>
                        <div class="playerPoints_d4e06"><?php echo $all['credit_points']; ?>  Cr</div>
                        </div>
                      </div>
                        <?php 
                      } ?>                         
                          </div>
                          </div>
                              <div class="teamPreviewRowWrapper_0c54c">
                                <div class="rowTitle_b91f3">Bowlers
                                </div>
                              <div class="spaceAround_64779 rowContent_8aa5f">
                                
                                <?php foreach ($bowls as $bowl) {
                                  $where = array('id'=>$bowl['player_id']);
                                  $table = 'players';
                                $bal =  $this->Website_model->get_where($where,$table);

                                $img = $this->Website_model->get_image($bowl['designationid']);  
                                if($team1 != $bal['teamid']){
                                  $style = "background-color: rgb(55, 89, 165);";
                                }else{
                                  $style = "background-color: rgb(196, 63, 45);";
                                }
                                  ?>
                                    <div class="spaceAround_64779 rowContent_8aa5f">
                                  <div class="js--field-player fieldPlayerMain_32975">
                                <div>
                                <div class="playerImageProfile_0cc1f">
                                  <div class="imageProfileContainer_6e52e">
                                  <div class="player-image-profile__image" style="background-image: url('<?php echo base_url('uploads/player/'.$img['image'])?>');">
                                    
                                  </div>
                              </div>
                            </div>
                            </div>
                              <div class="fieldPlayerTitle_4ac32" style="<?php echo $style; ?>"><?php echo $bal['name']; ?></div>
                              <div class="playerPoints_d4e06"><?php echo $bal['credit_points']; ?>  Cr</div>
                              </div>
                            </div>

                                  <?php 
                                } ?>

                             
                             
                              </div>
                            </div>
                            </div>
                            </div>
                            </div>
                              <div>
                                
                              </div>
                            </div>
                            </div>