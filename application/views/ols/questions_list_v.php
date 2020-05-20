											<?php $no = 1; foreach ($data as $s) { ?>
                                            <tr>                                                
                                                <td><?= $no++;?></td>
                                                                                            
                                                <td><?= $s->Title?></td>                        
                                                <td><?= $s->field?></td> 
                                                <td class="text-nowrap">                            
                                                    <a onclick="DeleteItem(<?= $s->_id ?>,<?= $s->id_parent ?>)" href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            <?php } ?>