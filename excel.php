<?php

//include 'config.php';

//include 'opendb.php';

include("../connectdb/connect.php");

 	mysql_select_db("soemonit_soemonit_pentaclt",$con);

	 if(!$con)

	{

		die('Could not connect to server' . mysql_error());

	}

include("month.php");

$month=new Month();

$tyear=$_GET["tyear"];

$tmth=$_GET["tmth"];

   $t=$month->getYear($tmth,$tyear);

//echo "year=".$t."<br>month=".$tmth;

 

$select = "select rpt.company_id,ec.company_name,rpt.month,rpt.fin_year, 

 man.actual_manpower,man.effective_month,

cap.used_capacity,cap.machine_efficiency,cap.capacity_utilization,

 eve.current_rowmaterial,eve.actual_rowmaterial,eve.cumulative_rowmaterial,eve.current_power_fuel,

 eve.actual_power_fuel,eve.cumulative_power_fuel,eve.current_other_variablecost,eve.actual_other_variablecost,

 eve.cumulative_other_variablecost,

emt.current_production,emt.actual_production,emt.cumulative_production,emt.current_cost,emt.actual_cost,

 emt.cumulative_cost,emt.current_profit1,emt.actual_profit1,emt.cumulative_profit1,emt.current_profit2,

 emt.actual_profit2,emt.cumulative_profit2,emt.current_cash_profit,emt.actual_cash_profit,emt.cumulative_cash_profit,

 emt.current_net_profit,emt.actual_net_profit,emt.cumulative_net_profit,

 ecb.sales,ecb.stock,ecb.current_rowmaterial,ecb.current_power_fuel,ecb.current_other_variablecost,

 ecb.current_employee_cost,ecb.current_other_expense,ecb.current_longterm_loan,ecb.current_workingterm_loan,

 ecb.current_other_income,ecb.current_depr,ecb.value_of_production,ecb.total_cost,ecb.profit_before_int,

 ecb.profit_before_depr,ecb.cash_profit,ecb.net_profit,

 efe.current_employee_cost,efe.actual_employee_cost,efe.cumulative_employee_cost,efe.current_other_expense,

 efe.actual_other_expense,efe.cumulative_other_expense,

 efc.current_longterm_loan,efc.actual_longterm_loan,efc.cumulative_longterm_loan,efc.current_workingterm_loan,

 efc.cumulative_workingterm_loan,

efi.sales_realisation,efi.value_of_orders,efi.sundry_creditors,efi.sundry_debtors,

 eod.current_other_income,eod.actual_other_income,eod.cumulative_other_income,eod.current_depr,

 eod.actual_depr,eod.cumulative_depr,

esd.PF,esd.ESI







from emp_monthly_report rpt



 LEFT JOIN emp_manpower man on rpt.Rpt_id=man.Rpt_id and rpt.company_id=man.company_id and rpt.month=man.month and rpt.fin_year=man.fin_year

LEFT JOIN emp_monthly_capacity cap on rpt.Rpt_id=cap.Rpt_id and rpt.company_id=cap.company_id and rpt.month=cap.month and rpt.fin_year=cap.fin_year

 LEFT JOIN emp_variable_expenses eve on rpt.Rpt_id=eve.Rpt_id and rpt.company_id=eve.company_id and rpt.month=eve.month and rpt.fin_year=eve.fin_year

 LEFT JOIN emp_monthlyreport_tot emt on rpt.Rpt_id=emt.Rpt_id and rpt.company_id=emt.company_id and rpt.month=emt.month and rpt.fin_year=emt.fin_year

 LEFT JOIN emp_actual_budget ecb on rpt.company_id=ecb.company_id and rpt.fin_year=ecb.fin_year 

 LEFT JOIN emp_fixed_expenses efe on rpt.Rpt_id=efe.Rpt_id and rpt.company_id=efe.company_id and rpt.month=efe.month and rpt.fin_year=efe.fin_year

LEFT JOIN emp_financial_charges efc on rpt.Rpt_id=efc.Rpt_id and rpt.company_id=efc.company_id and rpt.month=efc.month and rpt.fin_year=efc.fin_year

 LEFT JOIN emp_financial_indicators efi on rpt.Rpt_id=efi.Rpt_id and rpt.company_id=efi.company_id and rpt.month=efi.month and rpt.fin_year=efi.fin_year

 LEFT JOIN emp_otherincome_depr eod on rpt.Rpt_id=eod.Rpt_id and rpt.company_id=eod.company_id and rpt.month=eod.month and rpt.fin_year=eod.fin_year

 LEFT JOIN emp_statutory_dues esd on rpt.Rpt_id=esd.Rpt_id and rpt.company_id=esd.company_id and rpt.month=esd.month and rpt.fin_year=esd.fin_year

LEFT JOIN emp_company ec on rpt.company_id=ec.company_id



where rpt.month=".$tmth." and rpt.fin_year=".$t."";



echo $select;

/*

 

$export = mysql_query ( $select ) or die ( "Sql error : " . mysql_error( ) );

 

$fields = mysql_num_fields ( $export );

 

for ( $i = 0; $i < $fields; $i++ )

{

    $header .= mysql_field_name( $export , $i ) . "\t";

}

 

while( $row = mysql_fetch_row( $export ) )

{

    $line = '';

    foreach( $row as $value )

    {                                            

        if ( ( !isset( $value ) ) || ( $value == "" ) )

        {

            $value = "\t";

        }

        else

        {

            $value = str_replace( '"' , '""' , $value );

            $value = '"' . $value . '"' . "\t";

        }

        $line .= $value;

    }

    $data .= trim( $line ) . "\n";

}

$data = str_replace( "\r" , "" , $data );

 

if ( $data == "" )

{

    $data = "\n(0) Records Found!\n";                        

}

 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=your_file_name.xls");

header("Pragma: no-cache");

header("Expires: 0");

print "$header\n$data";

 */

?>