@extends('user.user_master')
@section('content')
<div class="row" style="padding-top: 20px;">
    @include('user.user_dash_sidbar')

    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr style="background: #e2e2e2;">
                        <td class="col-md-1">
                            <label for="">@if(session()->get('language') == 'lithuanian')Data  @else Date @endif </
                        <td 
                            <label for=""> @if(session()->get('language') == 'lithuanian') Iš viso @else Total @endif</
                        <td 
                            <label for="">@if(session()->get('language') == 'lithuanian') Mokėjimas @else Payment @endif </
                        <td 
                            <label for="">@if(session()->get('language') == 'lithuanian') Sąskaita faktūra @else Invoice @endif </
                        <td 
                            <label for="">@if(session()->get('language') == 'lithuanian') Užsisakykite @else Order @endif </
                        <td 
                            <label for="">@if(session()->get('language') == 'lithuanian') Veiksmas @else Action @endif  </label>
                        </td>
                    </tr>

                    @foreach($orders as $order)
                    <tr>
                        <td class="col-md-1">
                            <label for=""> {{ $order->order_date }}</label>
                        </td>
                        <td class="col-md-3">
                            <label for=""> {{ $order->amount }} €</label>
                        </td>
                        <td class="col-md-3">
                            <label for=""> {{ $order->payment_method }}</label>
                        </td>
                        <td class="col-md-2">
                            <label for=""> {{ $order->invoice_no }}</label>
                        </td>
                        <td class="col-md-2">
                            <label for="">
                                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
                            </label>
                        </td>
                        <td class="col-md-1">
                            <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>@if(session()->get('language') == 'lithuanian') Peržiūrėti @else View @endif</a>
                            <a href="{{ url('user/invoice/'.$order->id ) }}" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color: white;"></i>@if(session()->get('language') == 'lithuanian') Sąskaita faktūra @else Invoice @endif  </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection