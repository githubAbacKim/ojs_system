<script>
    window.onload = function () {
    window.print();
    setTimeout(function () { window.close(); }, 100);
}
</script>
<div class="container" style="margin:0;width:100%;">
    <div class="row">
        <div class="col-xs-12">
            <?php
                foreach ($property as $value) {
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                    <h3><?php echo $value->property_name;?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center" style="font-size:12pt;">
                    <?php
                        echo $value->street_name.', '.$value->municipality.', '.$value->state.', '.$value->country.' '.$value->zipcode;
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="row" style="margin-top:10px;">
                <div class="col-lg-12 col-md-12 text-center">
                    <h3 style="letter-spacing:8px;"><?php echo $page.'<br/>'.$this->uri->segment(3).' - '.$this->uri->segment(4);?></h3>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <style scope>
                /*table td, table th{
                    border:0 !important;
                }*/
                table td{
                    padding:3px 10px !important;
                }
            </style>
                <table class="table table-striped table-bordered table-hover" style="font-size:23px;">
                    <thead>
                        <tr>
                            <th style="font-size:12pt;" colspan="4"></th>
                            <th class="text-center" style="font-size:12pt;" colspan="4">Deduction</th>
                            <th style="font-size:12pt;"></th>
                            <th style="font-size:12pt;"></th>
                            <th style="font-size:12pt;"></th>
                        </tr>
                        <tr>
                            <th style="font-size:12pt;">Name</th>
                            <th style="font-size:12pt;">Position</th>
                            <th class="text-right" style="font-size:12pt;">Salary</th>
                            <th class="text-right" style="font-size:12pt;">Total OT</th>
                            <th class="text-right" style="font-size:12pt;">C.A</th>
                            <th class="text-right" style="font-size:12pt;">SSS</th>
                            <th class="text-right" style="font-size:12pt;">PhilHealth</th>
                            <th class="text-right" style="font-size:12pt;">Others</th>
                            <th class="text-right" style="font-size:12pt;">Total Deduction</th>
                            <th class="text-right" style="font-size:12pt;">Net Take Home</th>
                            <th class="text-right" style="font-size:12pt;">Signature</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result != false) {
                                $tca = 0;
                                $tothers = 0;
                                $tsss = 0;
                                $tph = 0;
                                $netSal = 0;
                                $start = $this->uri->segment(3);
                                $end = $this->uri->segment(4);
                                foreach ($result as $item) {
                                  if ($item->salary_date_start >= $start && $item->salary_date_end <= $end) {

                                      $name = $item->emp_lname.', '.$item->emp_fname.' '.$item->emp_mname;
                                      $sal = $item->salary_amount + $item->overtime_tamount;

                                      $netSal = $sal - $item->credit_amount;

                        ?>
                        <tr>
                            <td style="font-size:12pt;"><?php echo $name;?></td>
                            <td style="font-size:12pt;"><?php echo $item->job_position_name?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->salary_amount;?></td>
                            <td class="text-center" style="font-size:12pt;"><?php echo $item->overtime_tamount;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php
                                if ($amountCA != null) {
                                  foreach ($amountCA as $ca) {
                                    if ($ca['id'] == $item->emp_id) {
                                      echo $ca['amount'];
                                    }
                                  }
                                }
                            ?></td>
                            <td class="text-right" style="font-size:12pt;"><?php
                                if ($amountSSS != null) {
                                  foreach ($amountSSS as $sss) {
                                    if ($sss['id'] == $item->emp_id) {
                                      $tsss = $sss['amount'];
                                      echo $tsss;
                                    }
                                  }
                                }
                            ?></td>
                            <td class="text-right" style="font-size:12pt;"><?php
                                if ($amountPhil != null) {
                                  foreach ($amountPhil as $phil) {
                                    if ($phil['id'] == $item->emp_id) {
                                      $tph = $phil['amount'];
                                      echo $tph;
                                    }
                                  }
                                }
                            ?></td>
                            <td class="text-right" style="font-size:12pt;"><?php
                                if ($amountO != null) {
                                  foreach ($amountO as $others) {
                                    if ($others['id'] === $item->emp_id) {
                                      $tothers = $others['amount'];
                                      echo $tothers;
                                    }
                                  }
                                }
                            ?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $item->credit_amount;?></td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($netSal);?></td>
                            <td class="text-right" style="font-size:12pt;"></td>
                        </tr>
                        <?php
                                }
                              }
                        ?>
                        <!-- <tr style="font-weight: bold;">
                            <td style="font-size:12pt;" colspan="2">Total number of Attendance</td>
                            <td class="text-center" colspan="2" style="font-size:12pt;"><?php echo $rate;?></td>
                            <td style="font-size:12pt;" colspan="2">Total Amount</td>
                            <td class="text-right" style="font-size:12pt;"><?php echo $this->cart->format_number($tsal);?></td>
                        </tr> -->
                        <?php
                            }else{
                        ?>
                        <tr>
                            <td colspan="4">No Record Found.</td>
                        </tr>
                        <?php
                            }

                        ?>
                    </tbody>
                </table>
        </div>

    </div>
