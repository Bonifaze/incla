<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Remita Payments</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student ID</th>
                                <th>Status Code</th>
                                <th>Amount</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($remitas as $remita)
                            <tr>
                                <td>{{ $remita->id }}</td>
                                <td>{{ $remita->student_id }}</td>
                                <td>{{ $remita->status_code }}</td>
                                <td>{{ $remita->amount }}</td>
                                <td>{{ $remita->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $remitas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>