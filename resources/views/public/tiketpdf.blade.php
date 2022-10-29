
<div style="text-align: center;" id="download">
	<img src="{{asset('assets/img/lg1.png')}}" style="width:100px;">
	<br><br><br><br><br><br><br><br>
	 {!! QrCode::size(150)->generate('https://leadmefilm.com/cektiket/'.$tiket->qrCode) !!}
    <h4 style="margin-top: 0px;">{{$tiket->tiketOnline}}</h4>
    <h5 style="margin-top: -10px;">PEMESAN</h5>
    <h4 style="margin-top: -50px;">{{$users[0]->nama}}</h4>
    <h5 style="margin-top: -10px;">PENAYANGAN</h6>
    <h5 style="margin-top: -20px;">{{date('d M Y H:i',strtotime($tiket->penayangan->tanggal))}}<br>{{$tiket->penayangan->nama}}<br>Paroki {{$tiket->penayangan->parokis[0]->namaParoki}}<br>{{$tiket->penayangan->alamat}}</h5>
</div>