                                    <?php
                                        $no = 1;
                                        foreach($question as $key) { 
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-12">Questions <?= $no++;?> : <?= $key->Title?></label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="3" required=""  name="<?= $key->field?>"></textarea>
                                        </div>
                                    </div>                                 
                                    <?php } ?>
                                     <div class="text-xs-right">
                                        <button type="submit" name="save" value="save" class="btn btn-info">Submit</button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>