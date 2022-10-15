<?php
$data = file_get_contents("https://ojk-invest-api.vercel.app/api/illegals");
$perusahaan = json_decode($data);
// echo "<pre>";print_r($perusahaan->data->illegals[0]->number[0]);
$table = "<h3>Perusahaan Terdaftar OJK</h3>";
$table .= "<table border=1>
		<tr><td>No</td>
			<td>Nama PT</td>
			<td>Alamat</td>
			<td>Telepon</td>
			<td>Tipe</td>
			<td>Web</td></tr>";
for ($i = 0; $i < $perusahaan->data->count; $i++) {
	$no = $i + 1;

	$telepon = "";
	if ($perusahaan->data->illegals[$i]->number) {
		$telepon = $perusahaan->data->illegals[$i]->number[0];
	}

	$web = "";
	if ($perusahaan->data->illegals[$i]->urls) {
		$web = $perusahaan->data->illegals[$i]->urls[0];
	}

	$table .= "<tr><td>{$no}</td>
			<td>{$perusahaan->data->illegals[$i]->name}</td>
			<td>{$perusahaan->data->illegals[$i]->address}</td>
			<td>{$telepon}</td>
			<td>{$perusahaan->data->illegals[$i]->type}</td>
			<td>{$web}</td>
			</tr>";
}
$table .= "</table>";
echo $table;
