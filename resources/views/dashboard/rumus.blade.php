@if(count($sa)<>null)
  @foreach($sa as $j )
    @php     
    $la[]=$j->plant;
    $xa = count($la);
    @endphp
  @endforeach
  @else
    @php
    $xa = 0;
    @endphp
  @endif

  @if(count($sb)<>null)
  @foreach($sb as $j )
    @php     
    $lb[]=$j->plant;
    $xb = count($lb);
    @endphp
  @endforeach
  @else
    @php
    $xb = 0;
    @endphp
  @endif

  @if(count($sc)<>null)
  @foreach($sc as $j )
    @php     
    $lc[]=$j->plant;
    $xc = count($lc);
    @endphp
  @endforeach
  @else
    @php
    $xc = 0;
    @endphp
  @endif

  @if(count($sd)<>null)
  @foreach($sd as $j )
    @php     
    $ld[]=$j->plant;
    $xd = count($ld);
    @endphp
  @endforeach
  @else
    @php
    $xd = 0;
    @endphp
  @endif

  @if(count($se)<>null)
  @foreach($se as $j )
    @php     
    $le[]=$j->plant;
    $xe = count($le);
    @endphp
  @endforeach
  @else
    @php
    $xe = 0;
    @endphp
  @endif

  @if(count($sf)<>null)
  @foreach($sf as $j )
    @php     
    $lf[]=$j->plant;
    $xf = count($lf);
    @endphp
  @endforeach
  @else
    @php
    $xf = 0;
    @endphp
  @endif

  @if(count($sg)<>null)
  @foreach($sg as $j )
    @php     
    $lg[]=$j->plant;
    $xg = count($lg);
    @endphp
  @endforeach
  @else
    @php
    $xg = 0;
    @endphp
  @endif

  @if(count($sh)<>null)
  @foreach($sh as $j )
    @php     
    $lh[]=$j->plant;
    $xh = count($lh);
    @endphp
  @endforeach
  @else
    @php
    $xh = 0;
    @endphp
  @endif

@if(count($pa)<>null)
  @foreach($pa as $j )
    @php     
    $a[]=$j->plant;
    $ya = count($a);
    @endphp
  @endforeach
  @else
    @php
    $ya = 0;
    @endphp
  @endif
  
  @if(count($pb)<>null)
  @foreach($pb as $j )
    @php     
    $b[]=$j->plant;
    $yb = count($b);
    @endphp
  @endforeach
  @else
    @php
    $yb = 0;
    @endphp
  @endif

  @if(count($pc)<>null)
  @foreach($pc as $j )
    @php     
    $c[]=$j->plant;
    $yc = count($c);
    @endphp
  @endforeach
  @else
    @php
    $yc = 0;
    @endphp
  @endif
  
  @if(count($pd)<>null)
  @foreach($pd as $j )
    @php     
    $d[]=$j->plant;
    $yd = count($d);
    @endphp
  @endforeach
  @else
    @php
    $yd = 0;
    @endphp
  @endif

  @if(count($pm)<>null)
  @foreach($pm as $j )
    @php     
    $m[]=$j->plant;
    $ym = count($m);
    @endphp
  @endforeach
  @else
    @php
    $ym = 0;
    @endphp
  @endif

  @if(count($pe)<>null)
  @foreach($pe as $j )
    @php     
    $e[]=$j->plant;
    $ye = count($e);
    @endphp
  @endforeach
  @else
    @php
    $ye = 0;
    @endphp
  @endif

  @if(count($pr)<>null)
  @foreach($pr as $j )
    @php     
    $r[]=$j->plant;
    $yr = count($r);
    @endphp
  @endforeach
  @else
    @php
    $yr = 0;
    @endphp
  @endif

  @if(count($pj)<>null)
  @foreach($pj as $j )
    @php     
    $j[]=$j->plant;
    $yj = count($j);
    @endphp
  @endforeach
  @else
    @php
    $yj = 0;
    @endphp
  @endif
    
  @if(count($po)<>null)
  @foreach($po as $j )
    @php     
    $o[]=$j->plant;
    $yo = count($o);
    @endphp
  @endforeach
  @else
    @php
    $yo = 0;
    @endphp
  @endif

  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('bar-container', {
  chart: {
    type: 'bar'
  },
  title: {
    text: 'Total Proyek Berdasarkan Status'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['Finish', 'OnProgress', 'SPK/PO', 'Aanwijzing', 'Open PR', 'Desain', 'Planning', 'Cancel'],
    title: {
      text: null
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Total Proyek Status',
      align: 'high'
    },
    labels: {
      overflow: 'justify'
    }
  },
  tooltip: {
    valueSuffix: ' proyek'
  },
  plotOptions: {
    bar: {
      dataLabels: {
        enabled: true
      }
    }
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'top',
    x: -40,
    y: 80,
    floating: true,
    borderWidth: 1,
    backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    shadow: true
  },
  credits: {
    enabled: false
  },
  series: [{
    name: 'Total ',
    data: [<?=$xa?>, <?=$xb?>, <?=$xc?>, <?=$xd?>, <?=$xe?>, <?=$xf?>, <?=$xg?>, <?=$xh?>]
  }]
});
</script>

<script>
    Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Total Proyek Berdasarkan Plant'
  },
  subtitle: {
    text: ''
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total proyek'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
  },

  series: [
    {
      name: "Total Proyek",
      colorByPoint: true,
      data: [
        {
          name: "Plant A",
          y: <?=$ya?>,
          drilldown: "Plant A"
        },
        {
          name: "Plant BHI",
          y: <?=$yb?>,
          drilldown: "Plant BHI"
        },
        {
          name: "Plant C",
          y: <?=$yc?>,
          drilldown: "Plant C"
        },
        {
          name: "Plant DK",
          y: <?=$yd?>,
          drilldown: "Plant DK"
        },
        {
          name: "Plant M",
          y: <?=$ym?>,
          drilldown: "Plant M"
        },
        {
          name: "Plant E",
          y: <?=$ye?>,
          drilldown: "Plant E"
        },
        {
          name: "Plant R",
          y: <?=$yr?>,
          drilldown: "Plant R"
        },
        {
          name: "Plant Joint",
          y: <?=$yj?>,
          drilldown: "Plant Joint"
        },
        {
          name: "Other",
          y: <?=$yo?>,
          drilldown: "Other"
        }
      ]
    }
  ],
  drilldown: {
    series: [
      {
      }
       
    ]
  }
});
</script>
