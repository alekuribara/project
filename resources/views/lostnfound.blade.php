@extends('layout')
@section('title', 'Lost&Found')
@section('content')
  <section>
    <h2>Lost&amp;Found</h2>
    <form class="form" id="frm_search" role="form" method="post" action="/lostnfound">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
      <input type="hidden" id="searchType" name="searchType">
      <div class="form-group">
        <label for="txtSearch" class="sr-only">Search words</label>
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" id="searchOption" class="search btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option <span class="caret"></span></button>
            <ul id="searchOptions" class="dropdown-menu">
              <li><a href="#" id="Option">Option</a></li>
              <li><a href="#" id="qrCode">QR Code</a></li>
              <li><a href="#" id="petName">Pet Name</a></li>
            </ul>
          </div><!-- /btn-group -->
          <input type="text" name="searchText" id="searchText" class="form-control" placeholder="Name for Searching.." aria-label="..." value="{{ $input['searchText'] }}">
          <span class="input-group-btn">
            <button class="btn btn-info" type="button" onclick="search.doSearch();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
          </span>
        </div>
      </div>
    </form>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>QR Code</th>
          <th>Pet Name</th>
          <th>Pet</th>
          <th>Breed</th>
          <th>Owner</th>
          <th>State</th>
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
        {{-- */ $startNo = (($records->currentPage()-1) * $records->perPage()) + 1 /* --}}
        @foreach ($records as $data)
          <tr>
            <td>{{ $startNo++ }}</td>
            <td>{{ $data->qrCode }}</td>
            <td>{{ $data->petName }}</td>
            <td>{{ $data->petType }}</td>
            <td>{{ $data->breed }}</td>
            <td>{{ $data->userId }}</td>
            <td>{{ $data->status }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
    <div class="text-center">
      <?php echo $records->appends(['searchType' => $input['searchType'], 'searchText' => $input['searchText']])->render(); ?>
    </div>
  </section>
@stop

@push('scripts')
  $(document).ready(function() {
    $("#searchOptions li a").click(function() {
      var optionText = $(this).prop("id");
      $("#searchOption").text($(this).text());
      $("#searchType").val(optionText);
    });
    $("#searchOptions li a[id='{{ $input['searchType'] }}']").click();
  });

  var search = {
    doSearch : function() {
      $("#frm_search").submit();
    }
  }
@endpush
