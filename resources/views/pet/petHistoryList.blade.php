
@if($input['tab']==='vaccine')
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Vaccine Name</th>
          <th>Date</th>
          <th>Booster Date</th>
        </tr>
      </thead>
      <tbody>
     @if (count($records) === 0)
        <tr>
          <td colspan="7" class="text-center no-result">
              No data to show.
          </td>
        </tr>
      @else
        @foreach ($records as $data)
          <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->date }}</td>
            <td>{{ $data->boosterDate }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
@else
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Exam Name</th>
          <th>Date</th>
          <th>Result</th>
        </tr>
      </thead>
      <tbody>
      @if (count($records) === 0)
        <tr>
          <td colspan="7" class="text-center no-result">
              No data to show.
          </td>
        </tr>
      @else
        @foreach ($records as $data)
          <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->date }}</td>
            <td><span class="label label-{{ $data->result }}">{{ $data->result }}</span></td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
@endif
