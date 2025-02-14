<x-layout>
    <div class="shipment-container">
        <form action="{{ route('shipment.ingestData') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv">
            <button type="submit">Import CSV</button>
        </form>
        <div class="shipments"
                @foreach ($shipments as $shipment)
                    <div class="shipment">
                        <div class="shipment-body">
                            {{ $shipment->shipment_id." ".$shipment->latitude." ".$shipment->longitude." ".$shipment->temperature." ".$shipment->device_id}}
                        </div>
                    </div>
                @endforeach            
        </div>
        {{$shipments->links()}}
    </div>
</x-layout>
