<?php
ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('memory_limit', '-1'); 
require ('simple_html_dom.php');
require ('PHPUnit/Autoload.php');
class FileExistsTest extends \PHPUnit\Framework\TestCase
{
    public function testFileExist()
    {
		$this->assertFileExists('sample.xml');
		$this->assertFileExists('simple_html_dom.php');
    }
}
class Products{
	public $title;
	public $categories;
	public $imglinks;
	public $prices;
	public $descriptions1;
	public $brand;
	function resetObject() {
        foreach ($this as $key => $value) {
            $this->$key = null; 
        }
	}
	
}
$array1=array();
$array2=array();
$array3=array();
$array4=array();
$array5=array();
$array6=array();
$array7=array();
$arrsplit0=array();
$arrsplit1=array();
$arrsplit2=array();
$arr1;
$arr2;
$arr3;
$arr4;
$arr5;
$arr6;
$i;
$j=0;
$data = [];
$xml1 = simplexml_load_file("sample.xml");
$veri = new MongoDB\Driver\BulkWrite;
$client = new MongoDB\Driver\Manager('mongodb+srv://suatkuran:EPIKtetos80@cluster0.t1kyp.mongodb.net/scraper?retryWrites=true&w=majority');

foreach ($xml1->url as $loc) {
		foreach ($loc->loc as $keyLoc => $result) {
			$dom2 = file_get_html($result);
			if($dom2){
			
			foreach($dom2->find('li[itemprop=itemListElement]') as $key => $kategori){
				        $arr1[$keyLoc][$key] = trim($kategori->plaintext);
						$a[$keyLoc][$key] = preg_replace('/\s+/', ' ', $arr1[$keyLoc][$key]);
			}
			foreach($dom2->find('h1[id=product-name]') as $key => $isim){
				        $arr2[$keyLoc][$key] = ($isim->plaintext);
						$b[$keyLoc][$key] = preg_replace('/\s+/', ' ', $arr2[$keyLoc][$key]);
			}
			foreach($dom2->find('div[id=productDescriptionContent]') as $key => $aciklama1){
						$c[$keyLoc][$key] = trim($aciklama1->plaintext);
			}
			}
			foreach($dom2->find('img[class=product-image]')as $key => $resimlinki){
						   $d[$keyLoc][$key] = trim($resimlinki->src);
						   //$resimlinkleri = $resimlinki->src;
						   //$arr5 = array("resimler" => ($array3));
			}
			foreach($dom2->find('span[id=offering-price]')as $key => $fiyatlar)
			{
				           $arr5[$keyLoc][$key] = trim($fiyatlar->plaintext);
						   $e[$keyLoc][$key] = preg_replace('/\s+/', '', $arr5[$keyLoc][$key]);
			}
			foreach($dom2->find('span[class=brand-name]')as $key => $marka)
			{
				$arr6[$keyLoc][$key] = trim($marka->plaintext);
				$f[$keyLoc][$key] = preg_replace('/\s+/', '', $arr6[$keyLoc][$key]);
			}
						$myProduct = new Products();
						$myProduct->categories=$a[$keyLoc];
						$myProduct->title=$b[$keyLoc];
						$myProduct->descriptions1=$c[$keyLoc];
						$myProduct->imglinks=$d[$keyLoc];
						$myProduct->prices=$e[$keyLoc];
						$myProduct->brand=$f[$keyLoc];
						$veri->insert($myProduct);
						

			}
		}
$result = $client->executeBulkWrite('scraper.collection1', $veri);

//}
/*echo "<pre>";
print_r ($array1);
print_r ($array2);
print_r ($array3);
print_r ($array4);
print_r ($array5);
echo "</pre>";*/
echo "<pre>";
echo "operation is starting.";
echo "</pre>";


//$client = new \MongoDB\Client("mongodb://127.0.0.1:27017");
// Manager Class
//$client = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//$collection = $client->scraper->collection1;
//$client = new MongoDB\Client('mongodb+srv://suatkuran:EPIKtetos80@cluster0.t1kyp.mongodb.net/scraper?retryWrites=true&w=majority');
//$db = $client->scraper;
//$collection=$db->collection1;
/*for($i=0;$i<50;$i++){
	$document=array("title:"=>$b,
	"category:"=>$a,
	"aciklama1:"=>$c,
	"resimlinki:"=>$d,
	"fiyat:"=>$e,
	"marka:"=>$f);
}*/
//$document=array(array($i=>$myProduct));
/*$myfile = fopen("mysample.json", "w") or die("Unable to open file!");
fclose($myfile);*/
//$ab=json_encode($document);
//file_put_contents("data.json",$ab);
//$veri = new MongoDB\Driver\BulkWrite;
//for($i=0;$i<=$xml1.len;$i++){
#foreach($document as $documents){
#$veri->insert($documents);
#}
//$veri->insert($data);
//$result = $client->executeBulkWrite('scraper.collection1', $veri);
	//$veri->insert([$document[$j]]);
//$documents = json_encode($document);

	//sleep(10);
//$result = $collection->executeBulkWrite('scraper.collection1', $veri);
	//}
//$myProduct->resetObject();
//$veri->insert([$myProduct->categories,$myProduct->titles,$myProduct->imglinks,$myProduct->prices,$myProduct->descriptions1,$myProduct->descriptions2,$myProduct->brand]);
//}
//$sonuc = $db->executeBulkWrite('scraper.collection1', $veri);
echo "operation is successful."
/*
echo "<pre>";
print_r($array1);
print_r($array2);
print_r($arrsplit);
echo "</pre>";
*/
//$dom2->clear(); 
//unset($dom2);
?>