<?php 
?>
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel Pagination Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="flex flex-col text-left">
            <table class="n-w-full divide-y divide-gray-200">
                <thead>
                    <tr class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <th scope="col">#</th>
                        <th scope="col">officename</th>
                        <th scope="col">pincode</th>
                        <th scope="col">officeType</th>
                        <th scope="col">Deliverystatus</th>
                        <th scope="col">divisionname</th>
                        <th scope="col">regionname</th>
                        <th scope="col">circlename</th>
                        <th scope="col">Taluk</th>
                        <th scope="col">Districtname</th>
                        <th scope="col">statename</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pin_data as $data)
                    <tr>
                    
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->officename }}</td>
                        <td>{{ $data->pincode }}</td>
                        <td>{{ $data->officeType }}</td>
                        <td>{{ $data->Deliverystatus }}</td>
                        <td>{{ $data->divisionname }}</td>
                        <td>{{ $data->regionname }}</td>
                        <td>{{ $data->circlename }}</td>
                        <td>{{ $data->Taluk }}</td>
                        <td>{{ $data->Districtname }}</td>
                        <td>{{ $data->statename }}</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>

        {{-- Pagination --}}
        <div class="pagination">
            {!! $pin_data->links() !!}
        </div>
        </div>
    </body>
</html>