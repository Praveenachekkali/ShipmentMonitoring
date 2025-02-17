<x-layout>
    <div class="shipment-container">
        <form action="{{ route('shipment.ingestData') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv">
            <button type="submit">Import CSV</button>
        </form>
        <div class="shipments"
                <h1>ShipID$Temp$DevID$TimeStamp</h1>
                @foreach ($shipments as $shipment)
                    <div class="shipment">
                        <div class="shipment-body">
                            {{ $shipment->shipment_id."$".$shipment->temperature."$".$shipment->device_id."$".$shipment->timestamp}}
                        </div>
                    </div>
                @endforeach            
        </div>
        {{$shipments->links()}}
    </div>
</x-layout>
