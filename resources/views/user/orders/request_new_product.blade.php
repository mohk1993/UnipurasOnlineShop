@extends('user.user_master')
@section('content')

<div class="body-content">
    <div class="container">
        <h2> <span class="text-danger">@if(session()->get('language') == 'lithuanian') Dirbame prie šios funkcijos, kad galėtume padėti jums pritaikyti užsakymus. Atkreipkite dėmesį, kad dabar šiame puslapyje negalite atlikti jokių veiksmų. @else We are working on this function to help you customize your orders. Please note that you can not take any action on this page now. @endif</span> </h2>
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group checkout-steps" id="accordion">
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                        <span>1</span>Models Information
                                    </a>
                                </h4>
                            </div>
                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{asset('user-images/Elbows.png')}}" style="width: 350px;">
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{asset('user-images/FormedPoces.png')}}" style="width: 350px;">
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{asset('user-images/Pipe.png')}}" style="width: 350px;">
                                        </div>
                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <div class="panel panel-default checkout-step-02">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                                        <span>2</span>Ventilation Ducts
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="row">
                                        <form method="POST" action="">
                                            @csrf
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Part</th>
                                                        <th scope="col">Material</th>
                                                        <th scope="col">ducts size</th>
                                                        <th scope="col">Insulation Thickness</th>
                                                        <th scope="col">Degree of Elbow</th>
                                                        <th scope="col">Radius</th>
                                                        <th scope="col">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <select name="part_id" class="form-control" required="">
                                                                        <option value="" selected="" disabled="">Select Part</option>
                                                                        <option value="T-Connections">T-Connections</option>
                                                                        <option value="T-Piece">T-Piece</option>
                                                                        <option value="Elbow">Elbow</option>
                                                                        <option value="Reducer">Reducer</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <select name="mat_id" class="form-control" required="">
                                                                        <option value="" selected="" disabled="">Select Material</option>
                                                                        <option value="PVDF">PVDF</option>
                                                                        <option value="NOVA">NOVA</option>
                                                                        <option value="PVC">PVC</option>
                                                                        <option value="Steel">Steel</option>
                                                                        <option value="Aluminium">Aluminium</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <select name="size_id" class="form-control" required="">
                                                                        <option value="" selected="" disabled="">Select Size</option>
                                                                        <option value="160">160</option>
                                                                        <option value="200">200</option>
                                                                        <option value="250">250</option>
                                                                        <option value="315">315</option>
                                                                        <option value="400">400</option>
                                                                        <option value="500">500</option>
                                                                        <option value="630">630</option>
                                                                        <option value="800">800</option>
                                                                        <option value="1000">1000</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <select name="thick_id" class="form-control" required="">
                                                                        <option value="" selected="" disabled="">Select Thickness</option>
                                                                        <option value="30">30</option>
                                                                        <option value="40">40</option>
                                                                        <option value="50">50</option>
                                                                        <option value="60">60</option>
                                                                        <option value="80">80</option>
                                                                        <option value="100">100</option>
                                                                        <option value="120">120</option>
                                                                        <option value="140">140</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <select name="digree_elbow" class="form-control" required="">
                                                                        <option value="" selected="" disabled="">Select Degree</option>
                                                                        <option value="90">90</option>
                                                                        <option value="45">45</option>
                                                                        <option value="30">30</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <select name="radius" class="form-control" required="">
                                                                        <option value="" selected="" disabled="">Select Radius</option>
                                                                        <option value="1XD">1XD</option>
                                                                        <option value="2XD">2XD</option>
                                                                        <option value="3XD">3XD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <input type="number" min="1" oninput="validity.valid||(value='');" name="qty" class="form-control" required="" data-validation-required-message="This field is required">
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="modal-footer modal-footer-uniform">
                                                <input type="submit" class="btn btn-rounded btn-primary float-right" value="Order">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection