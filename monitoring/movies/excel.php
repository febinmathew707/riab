<?php
//include 'config.php';
//include 'opendb.php';
include("../connectdb/connect.php");
 	mysql_select_db("soemonit_soemonit_pentaclt",$con);
	 if(!$con)
	{
		die('Could not connect to server' . mysql_error());
	}
echo "sfsfsd".$_GET["tmth"];
echo $_GET["tyear"];
 /*
$select = "select rpt.Rpt_id,rpt.company_id,rpt.month,rpt.fin_year, 
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
INNER JOIN emp_manpower man on rpt.Rpt_id=man.Rpt_id
INNER JOIN emp_monthly_capacity cap on rpt.Rpt_id=cap.Rpt_id
INNER JOIN emp_variable_expenses eve on rpt.Rpt_id=eve.Rpt_id
INNER JOIN emp_monthlyreport_tot emt on rpt.Rpt_id=emt.Rpt_id
INNER JOIN emp_actual_budget ecb on rpt.company_id=ecb.company_id and rpt.fin_year=ecb.fin_year
INNER JOIN emp_fixed_expenses efe on rpt.Rpt_id=efe.Rpt_id
INNER JOIN emp_financial_charges efc on rpt.Rpt_id=efc.Rpt_id
INNER JOIN emp_financial_indicators efi on rpt.Rpt_id=efi.Rpt_id
INNER JOIN emp_otherincome_depr eod on rpt.Rpt_id=eod.Rpt_id
INNER JOIN emp_statutory_dues esd on rpt.Rpt_id=esd.Rpt_id

where rpt.month=4 and rpt.fin_year=2009";
 
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