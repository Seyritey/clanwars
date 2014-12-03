<?
$rpm = 'rpm';
?>
<!DOCTYPE html>
<html>
<head>
  <title>jVectorMap demo</title>
  <link rel="stylesheet" href="jquery-jvectormap-2.0.1.css" type="text/css" media="screen"/>
  <meta http-equiv="content-type" content="text/html; charset=utf8">
  <script src="jquery.js"></script>
  <script src="jquery-jvectormap-2.0.1.min.js"></script>
  <script src="jquery-jvectormap-fr_regions-mill-en.js"></script>
</head>
<body>
  <div id="world-map" style="width: 100%; height: 980px"></div>
  <script>
$(function(){
  var plants = [
    {name: 'Rome', coords: [45.6091294, 4.8371812], status: 'castle', offsets: [-43, -37]},
    {name: 'Barnabe', coords: [44.0091294, -0.7371812], status: 'willage1', offsets: [-58, -34]},
    {name: 'RPM vs Naimans', coords: [48.0091294, -2.7371812], status: 'battle', offsets: [-93, -38]},
    {name: 'Capua', coords: [44.0091294, 6.1971812], status: 'willage2', offsets: [-40, -27]},
    {name: 'San-Bernardo', coords: [47.4216974, 3.6706389], status: 'castle2', offsets: [-70, -37]}
  ];

  new jvm.Map({
    container: $('#world-map'),
    map: 'fr_regions_mill_en',
    markers: plants.map(function(h){ return {name: h.name, latLng: h.coords} }),
    markerLabelStyle: {
      initial: {
      	'font-size': '15',
   		'font-weight': 'bold',
        fill: '#323'
      },
      hover: {
        fill: 'black'
      }
    },
    labels: {
        markers: {
          render: function(index){
            return plants[index].name;
          },
          offsets: function(index){
            var offset = plants[index]['offsets'] || [0, 0];

            return [offset[0] - 7, offset[1] + 3];
          }
        }
    },
    series: {
      markers: [{
        attribute: 'image',
        scale: {
          'castle': 'castle.svg',
          'castle2': 'castle2.svg',
          'willage1': 'willage1.svg',
          'willage2': 'willage2.svg',
          'battle': 'battle.svg'
        },
        values: plants.reduce(function(p, c, i){ p[i] = c.status; return p }, {}),
      }],
      regions: [{
        scale: {
          RPM: '#FF3333',
          Nag: '#996699',
          Guard: '#FFFF66',
          Naimans: '#66CC66',
          KTA: '#333300',
          Clear: '#FFFFFF',
          Byzant: '#3366FF'
        },
        attribute: 'fill',
        values: {
          "FR-B": 'RPM',
          "Malta": 'Clear',
          "Neapol": 'Clear',
          "Ellada": 'Clear',
          "Stambul": 'Byzant',
          "Hierusalem": 'Clear',
          "Belgrad": 'Clear',
          "Macedonia": 'Clear',
          "Pompei": 'Clear',
          "Venice": 'Clear',
          "Hessen": 'Clear',
          "MiddleEarth": 'Clear',
          "Praha": 'Clear',
          "Warszawa": 'Naimans',
          "Kiev": 'Clear',
          "Krakov": 'Clear',
          "Tallin": 'Clear',
          "Orden": 'KTA',
          "Norway": 'Clear',
          "Denmark": 'Clear',
          "Brandenburg": 'Clear',
          "Paris": 'Guard',
          "Valhalla": 'Nag'
        },
        legend: {
          horizontal: true,
          title: 'Фракции'
        }
      },{
        scale: {
          redGreen: '/img/bg-red-green.png',
          yellowBlue: '/img/bg-yellow-blue.png'
        },
        values: {
          "FR-A": 'redGreen',
          "Auvergne": 'yellowBlue'
        },
        attribute: 'fill',
      }]
    }
  });
});
  </script>
</body>
</html>