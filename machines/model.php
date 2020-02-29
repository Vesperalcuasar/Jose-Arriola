<?php
session_start();
include '../config/config.php';

class machine
{
    private $config;
    private $conn;

    function __construct()
    {
        $this->config = new Config();
        $this->conn = $this->config->makeConnection();
    }

    function create($data)
    {
        $response = array('success' => false);
        switch ($data["machineType"]) {
            case "sheller":
                $sql = "INSERT INTO machines (user_id,variety,lot_number,total_bins,production_minutes,production_hours,name,machine_type,pounds_per_hour,goal_of_the_day,pounds,date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                if ($stmt->execute([$_SESSION["user"]["id"], $data["variety"], $data["lotNumber"], $data["totalBins"], $data["productionMinutes"], $data["productionHours"], $data["name"], $data["machineType"],
                    $data["poundsPerHour"], $data["goalOfTheDay"], $data["pounds"], $data["date"]])) {
                    $response['success'] = true;
                }
                break;
            case "sheller-bsi":
            case "bsi-ls" :
            {
                $sql = "INSERT INTO machines (user_id,variety,lot_number,total_bins,off_grade_bins,production_minutes,production_hours,name,machine_type,pounds_per_hour,goal_of_the_day,pounds,date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                if ($stmt->execute([$_SESSION["user"]["id"], $data["variety"], $data["lotNumber"], $data["totalBins"], $data["offGradeBins"], $data["productionMinutes"], $data["productionHours"], $data["name"], $data["machineType"],
                    $data["poundsPerHour"], $data["goalOfTheDay"], $data["pounds"], $data["date"]])) {
                    $response['success'] = true;
                }
                break;
            }
            case "helius" :
                $sql = "INSERT INTO machines (user_id,variety,lot_number,total_bins,off_grade_bins,production_minutes,production_hours,name,machine_type,pounds_per_hour,goal_of_the_day,pounds,date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                if ($stmt->execute([$_SESSION["user"]["id"], $data["variety"], $data["lotNumber"], $data["totalBins"], $data["offGradeBins"], $data["productionMinutes"], $data["productionHours"], $data["name"], $data["machineType"],
                    $data["poundsPerHour"], $data["goalOfTheDay"], $data["pounds"], $data["date"]])) {
                    $response['success'] = true;
                }
                break;
            case "packing-line" :
                $sql = "INSERT INTO machines (user_id,variety,product_type,lot_number,total_bins,total_pallets,off_grade_bins,case_weight,production_minutes,production_hours,name,machine_type,pounds_per_hour,goal_of_the_day,pounds,date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                if ($stmt->execute([$_SESSION["user"]["id"], $data["variety"], $data["productType"], $data["lotNumber"], $data["totalBins"], $data["totalPallets"], $data["offGradeBins"], $data["caseWeight"], $data["productionMinutes"], $data["productionHours"], $data["name"], $data["machineType"],
                    $data["poundsPerHour"], $data["goalOfTheDay"], $data["pounds"], $data["date"]])) {
                    $response['success'] = true;
                }
                break;
        }
        if ($response["success"] === true) {
            $response['message'] = 'Machine is saved successfully';
        } else {
            $response['error'] = 'Something wrong happened, please try again';
        }
        return $response;
    }
}
