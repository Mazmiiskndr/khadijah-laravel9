<tbody>
    @foreach ($visitors as $no => $visitor)
    <tr>
        <td>{{ $no + 1 }}</td>
        <td>{{ $this->getBrowser($visitor->user_agent) }}</td>
        <td>{{ $visitor->ip_address }}</td>
    </tr>
    @endforeach
</tbody>
