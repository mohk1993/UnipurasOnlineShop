<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
    .inimage {
        width: 60px;
        height: 60px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>UniShop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               UniShop Head Office
               Email:support@unishop.com <br>
               Mob: +370 60186028 <br>
               Kaunas <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>@if(session()->get('language') == 'lithuanian') Pavadinimas @else Name @endif:</strong> {{ $order->name }} <br>
           <strong>@if(session()->get('language') == 'lithuanian') El. paštas @else Email @endif:</strong> {{ $order->email }} <br>
           <strong>@if(session()->get('language') == 'lithuanian') Telefonas @else Phone @endif:</strong> {{ $order->phone }} <br>
            
           <strong>@if(session()->get('language') == 'lithuanian') Adresas @else Address @endif:</strong> {{ $order->division->shipment_name }} <br>
           <strong>@if(session()->get('language') == 'lithuanian') Pašto kodas @else Post Code @endif:</strong> {{ $order->post_code }}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">@if(session()->get('language') == 'lithuanian') Sąskaita faktūra @else Invoice @endif:</span> #{{ $order->invoice_no }}</h3>
            @if(session()->get('language') == 'lithuanian') Užsakymo data @else Order Date @endif: {{ $order->order_date }} <br>
            @if(session()->get('language') == 'lithuanian') Mokėjimo tipas @else Payment Type @endif : {{ $order->payment_method }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>@if(session()->get('language') == 'lithuanian') Vaizdas @else Image @endif</th>
        <th>@if(session()->get('language') == 'lithuanian') Produkto pavadinimas @else Product Name @endif</th>
        <th>@if(session()->get('language') == 'lithuanian') Kodas @else Code @endif</th>
        <th>@if(session()->get('language') == 'lithuanian') Kiekis @else Quantity @endif</th>
        <th>@if(session()->get('language') == 'lithuanian') Vieneto kaina @else Unit Price @endif </th>
        <th> @if(session()->get('language') == 'lithuanian') Mokesčiai @else Tax @endif</th>
        <th>@if(session()->get('language') == 'lithuanian') Iš viso @else Total @endif </th>
      </tr>
    </thead>
    <tbody>

    @foreach($orderItem as $item)
      <tr class="font">
        <td align="center">
            <img class="inimage" src=" {{ public_path($item->product->product_thambnail) }}" style="height: 40px; width: 60px;">
        </td>
        <td align="center"> {{ $item->product->product_name_en }}</td>
        <td align="center">{{ $item->product->product_code }}</td>
        <td align="center">{{ $item->qty }}</td>
        <td align="center">€{{ $item->price }}</td>
        <td align="center">€{{ ($item->price * $item->qty)*0.05 }}</td>
        <td align="center">€{{ (($item->price * $item->qty)*0.05) + ($item->price * $item->qty) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">@if(session()->get('language') == 'lithuanian') Iš viso prieš mokesčius @else Total befor tax @endif:</span> {{($item->price * $item->qty)}}</h2>
            <h2><span style="color: green;">@if(session()->get('language') == 'lithuanian') Mokesčiai @else Tax @endif:</span> €{{ ($item->price * $item->qty)*0.05 }}</h2>
            <h2><span style="color: green;">@if(session()->get('language') == 'lithuanian') Iš viso po mokesčių @else Total after tax @endif:</span> €{{ (($item->price * $item->qty)*0.05) + ($item->price * $item->qty) }}</h2>
            {{-- <h2><span style="color: green;">@if(session()->get('language') == 'lithuanian') Visas mokėjimas @else Full Payment @endif</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Using Our service </p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>