///////////// UPDATE COMPANY /////////////////////
var pgtype
function updateCompany(typ)
{ 
	//alert("here")
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	 	
	if(document.getElementById("txtName").value=="")
	{
		alert("Company Name shouldn't be blank")
		document.frmCompany.txtName.select()
		return
	}
	if(document.getElementById("txtManPower").value=="")
	{
		alert("Actual manpower should be a number")
		document.frmCompany.txtManPower.select()
		return
	}
	if(isNaN(document.getElementById("txtManPower").value)==true)
	{
		alert("Actual manpower should be a number")
		document.frmCompany.txtManPower.select()
		return
	}	
	if(document.getElementById("txtInstCapacity").value=="")
	{
		alert("Installed capacity should be a number")
		document.frmCompany.txtInstCapacity.select()
		return
	}
	if(isNaN(document.getElementById("txtInstCapacity").value)==true)
	{
		alert("Installed capacity should be a number")
		document.frmCompany.txtInstCapacity.select()
		return
	}
	if(document.getElementById("txtEmail").value=="")
	{
		alert("Email shouldn't be blank")
		document.frmCompany.txtEmail.select()
		return
	}
	if(document.getElementById("txtPhone").value=="")
	{
		alert("Phone shouldn't be blank")
		document.frmCompany.txtPhone.select()
		return
	}
	
	var url="updatecompany.php"	
	url=url+"?type="+typ
	url=url+"&name="+document.getElementById("txtName").value
	url=url+"&add1="+document.getElementById("txtAdd1").value
	url=url+"&add2="+document.getElementById("txtAdd2").value
	url=url+"&activity="+document.getElementById("txtActivity").value
	url=url+"&manpower="+document.getElementById("txtManPower").value
	url=url+"&instcapcity="+document.getElementById("txtInstCapacity").value
	url=url+"&email="+document.getElementById("txtEmail").value
	url=url+"&unit="+document.getElementById("txtUnit").value
	url=url+"&phone="+document.getElementById("txtPhone").value
	url=url+"&sid="+Math.random()
	//alert(url)	
	xmlHttp.onreadystatechange=searchStateChanged1 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
function searchStateChanged1()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		alert(xmlHttp.responseText)	
		//document.frmCompany.reset()
		window.location.reload()
		document.frmCompany.txtName.select()		
	}
}
function updateBudget(type,val)
{ 
	//alert("here")
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	 	
	if(document.getElementById("cmbCompany").value==0)
	{
		alert("You should select a company")
		return
	}
	if(document.getElementById("cmbFinYear").value==0)
	{
		alert("You should select a financial year")
		return
	}
	if(document.getElementById("txtSales").value=="")
	{
		alert("Sales shouldn't be blank")
		document.frmCompany.txtSales.select()
		return
	}	
	if(document.getElementById("txtStock").value=="")
	{
		alert("Stock shouldn't be blank")
		document.frmCompany.txtStock.select()
		return
	}
	if(isNaN(document.getElementById("txtSales").value)==true)
	{
		alert("Sales should be a number")
		document.frmCompany.txtSales.select()
		return
	}
	if(document.getElementById("txtStock").value=="")
	{
		alert("Stock shouldn't be blank")
		document.frmCompany.txtStock.select()
		return
	}
	
	var url="updatebudget.php"	
	url=url+"?type="+type
	url=url+"&company="+document.getElementById("cmbCompany").value
	url=url+"&finyear="+document.getElementById("cmbFinYear").value
	url=url+"&sales="+document.getElementById("txtSales").value
	url=url+"&stock="+document.getElementById("txtStock").value
	url=url+"&currentrawmaterial="+document.getElementById("txtCurrentRawMaterial").value
	url=url+"&currentpowerfuel="+document.getElementById("txtCurrent_Power_Fuel").value
	url=url+"&currentothervariablecost="+document.getElementById("txtCurrent_Other_Variablecost").value
	url=url+"&currentemployeecost="+document.getElementById("txtCurrentEmployeeCost").value	
	url=url+"&currentotherexpense="+document.getElementById("txtCurrentOtherExpense").value
	url=url+"&currentlongtermloan="+document.getElementById("txtCurrentLongTermLoan").value
	url=url+"&currentworkingtermloan="+document.getElementById("txtCurrentWorkingTermLoan").value
	url=url+"&currentotherincome="+document.getElementById("txtCurrentOtherIncome").value	
	url=url+"&currentdepr="+document.getElementById("txtCurrentDepreciation").value
	url=url+"&valueofproduction="+document.getElementById("txtValueOfProduction").value
	url=url+"&totalcost="+document.getElementById("txtTotalCost").value
	url=url+"&profitbeforeint="+document.getElementById("txtProfitBeforeINT").value
	url=url+"&profitbeforedepr="+document.getElementById("txtProfitBeforeDepr").value
	url=url+"&cashprofit="+document.getElementById("txtCashProfit").value
	url=url+"&netprofit="+document.getElementById("txtNetProfit").value
	
	url=url+"&val="+val
	url=url+"&sid="+Math.random()
	//alert(url)	
	xmlHttp.onreadystatechange=budgetUpdated 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
function budgetUpdated()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//document.getElementById("main").innerHTML=xmlHttp.responseText
		alert(xmlHttp.responseText)	
		//document.frmCompany.reset()
		window.location.reload()
		//document.frmCompany.txtName.select()		
	}
}
function edit(type,val)
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	 	
	pgtype=type
	
	var url="edit.php"	
	url=url+"?type="+type
	url=url+"&val="+val	
	url=url+"&sid="+Math.random()
	//alert(url)	
	xmlHttp.onreadystatechange=edited 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
function edited()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		//alert(xmlHttp.responseText)
		//alert(pgtype)
		//document.getElementById("main").innerHTML=xmlHttp.responseText	
		//alert(pgtype)
		switch(pgtype)	
		{
			case "company":
							dispmain("companymaster")
							break
			case "turnover":
							dispmain("turnovermaster")
							break
			case "product":
							dispmain("productmaster")
							break
			case "actbudget":
							dispmain("actbudget")
							break
			case "revbudget":
							dispmain("revbudget")
							break
		}
		
		
	}
}
function del(type,val)
{
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }	 	
	pgtype=type
	if(confirm("Are you sure to delete"))
	{	
		var url="delete.php"	
		url=url+"?type="+type
		url=url+"&val="+val	
		url=url+"&sid="+Math.random()
		//alert(url)	
		xmlHttp.onreadystatechange=deleted 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null) 
	}
}
function deleted()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		alert(xmlHttp.responseText)
		//document.getElementById("listcom").innerHTML=xmlHttp.responseText
		window.location.reload()
	}
}
//////////////////// UPDATE PRODUCTS /////////////////////////
function updateProduct(typ)
{ 
	//alert(typ)
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	 	
	if(document.getElementById("txtName").value=="")
	{
		alert("Item Name shouldn't be blank")
		document.frmCompany.txtName.select()
		return
	}
	//alert("here")
	var url="updateproducts.php"	
	url=url+"?type="+typ
	//
	url=url+"&itname="+document.getElementById("txtName").value
	url=url+"&instcapacity="+document.getElementById("txtInstCapacity").value
	url=url+"&achcapacity="+document.getElementById("txtAchCapacity").value
	url=url+"&unit="+document.getElementById("txtUnit").value
	url=url+"&finyear="+document.getElementById("cmbFinYear").value	
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=searchStateChanged1 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
//////////////////// UPDATE FINYEAR /////////////////////////
function updateFinyear(typ)
{ 

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	 	
	if(document.getElementById("txtName").value=="")
	{
		alert("Fin Year shouldn't be blank")
		document.frmCompany.txtName.select()
		return
	}
	//alert("here")
	var url="updatefinyear.php"	
	url=url+"?type="+typ
	//
	url=url+"&finyear="+document.getElementById("txtName").value
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=searchStateChanged1 
	xmlHttp.open("GET",url,true)
	//alert(url)
	xmlHttp.send(null) 
}
//////////////////// UPDATE TURN OVER /////////////////////////
function updateTurnOver(typ)
{ 

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	 	

	if(document.getElementById("cmbFinYear").value==0)
	{
		alert("You should select the financial year")
		//document.frmCompany.cmbFinYear.select()
		return
	}
	if(document.getElementById("txtTurnOver").value=="")
	{
		alert("turn over should be a number")
		document.frmCompany.txtTurnOver.select()
		return
	}
	if(document.getElementById("txtPandL").value=="")
	{
		alert("P and L  should be a number")
		document.frmCompany.txtPandL.select()
		return
	}
	if(isNaN(document.getElementById("txtTurnOver").value)==true)
	{
		alert("turn over should be a number")
		document.frmCompany.txtTurnOver.select()
		return
	}
	if(isNaN(document.getElementById("txtPandL").value)==true)
	{
		alert("P and L  should be a number")
		document.frmCompany.txtPandL.select()
		return
	}
	//alert("here")
	var url="updateturnover.php"	
	url=url+"?type="+typ	
	url=url+"&finyear="+document.getElementById("cmbFinYear").value
	url=url+"&turnover="+document.getElementById("txtTurnOver").value
	url=url+"&pandl="+document.getElementById("txtPandL").value
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=turnOverUpdated 
	xmlHttp.open("GET",url,true)
	//alert(url)
	xmlHttp.send(null) 
}
function turnOverUpdated()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)	
		window.location.reload()
		//document.frmCompany.reset()
		//document.frmCompany.cmbCompany.select()
	}
}
//////////////////// UPDATE CAPACITY /////////////////////////
function updateCapacity(typ)
{ 

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	//alert(document.getElementById("txtAchCapacity").value)
	
	if(document.getElementById("cmbFinYear").value==0)
	{
		alert("You should select the financial year")
		document.frmCompany.cmbFinYear.select()
		return
	}
	if(document.getElementById("txtAchCapacity").value=="")
	{
		alert("Achieveable capacity should be a number")
		document.frmCompany.txtAchCapacity.select()
		return
	}
	if(isNaN(document.getElementById("txtAchCapacity").value)==true)
	{
		alert("Achieveable capacity  should be a number")
		document.frmCompany.txtAchCapacity.select()
		return
	}
	if(document.getElementById("txtUsedCapacity").value=="")
	{
		alert("Used Capacity should be a number")
		document.frmCompany.txtUsedCapacity.select()
		return
	}
	if(isNaN(document.getElementById("txtUsedCapacity").value)==true)
	{
		alert("Used Capacity should be a number")
		document.frmCompany.txtUsedCapacity.select()
		return
	}

	
	
	if(document.getElementById("txtProdqtyFormonth").value=="")
	{
		alert("Production Qty should be a number")
		document.frmCompany.txtProdqtyFormonth.select()
		return
	}
	if(isNaN(document.getElementById("txtProdqtyFormonth").value)==true)
	{
		alert("Production Qty should be a number")
		document.frmCompany.txtProdqtyFormonth.select()
		return
	}
	
	if(document.getElementById("txtProdqtyCum").value=="")
	{
		alert("Cummulative production qty should be a number")
		document.frmCompany.txtProdqtyCum.select()
		return
	}
	if(isNaN(document.getElementById("txtProdqtyCum").value)==true)
	{
		alert("Cummulative production qty should be a number")
		document.frmCompany.txtProdqtyCum.select()
		return
	}
	
	if(document.getElementById("txtSaleqtyFormonth").value=="")
	{
		alert("Sale qty should be a number")
		document.frmCompany.txtSaleqtyFormonth.select()
		return
	}
	if(isNaN(document.getElementById("txtSaleqtyFormonth").value)==true)
	{
		alert("Sale qty should be a number")
		document.frmCompany.txtSaleqtyFormonth.select()
		return
	}
	
	if(document.getElementById("txtSaleqtyCum").value=="")
	{
		alert("Cummulative sales qty should be a number")
		document.frmCompany.txtSaleqtyCum.select()
		return
	}
	if(isNaN(document.getElementById("txtSaleqtyCum").value)==true)
	{
		alert("Cummulative sales qty should be a number")
		document.frmCompany.txtSaleqtyCum.select()
		return
	}

	if(document.getElementById("txtEfficiency").value=="")
	{
		alert("Machine Efficiency should be a number")
		document.frmCompany.txtEfficiency.select()
		return
	}
	if(isNaN(document.getElementById("txtEfficiency").value)==true)
	{
		alert("Machine efficiency should be a number")
		document.frmCompany.txtEfficiency.select()
		return
	}
	if(document.getElementById("txtUtilization").value=="")
	{
		alert("Capacity utilization should be a number")
		document.frmCompany.txtUtilization.select()
		return
	}
	if(isNaN(document.getElementById("txtUtilization").value)==true)
	{
		alert("Capacity utilization should be a number")
		document.frmCompany.txtUtilization.select()
		return
	}
	
	if(document.getElementById("txtProdqtyFormonth").value=="")
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtProdqtyFormonth.select()
		return
	}
	if(isNaN(document.getElementById("txtProdqtyFormonth").value)==true)
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtProdqtyFormonth.select()
		return
	}
	
	if(document.getElementById("txtProdqtyCum").value=="")
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtProdqtyCum.select()
		return
	}
	if(isNaN(document.getElementById("txtProdqtyCum").value)==true)
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtProdqtyCum.select()
		return
	}
	
	if(document.getElementById("txtSaleqtyFormonth").value=="")
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtSaleqtyFormonth.select()
		return
	}
	if(isNaN(document.getElementById("txtSaleqtyFormonth").value)==true)
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtSaleqtyFormonth.select()
		return
	}

//********************
	if(document.getElementById("txtSaleqtyCum").value=="")
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtSaleqtyCum.select()
		return
	}
	if(isNaN(document.getElementById("txtProdqtyCum").value)==true)
	{
		alert("Production in quantity should be a number")
		document.frmCompany.txtSaleqtyCum.select()
		return
	}
//*******************
	
	var url="updatecapacity.php"	
	url=url+"?type="+typ	
	url=url+"&finyear="+document.getElementById("cmbFinYear").value
	url=url+"&achcapacity="+document.getElementById("txtAchCapacity").value
	url=url+"&usedcapacity="+document.getElementById("txtUsedCapacity").value
	url=url+"&efficiency="+document.getElementById("txtEfficiency").value
	url=url+"&utilization="+document.getElementById("txtUtilization").value
	
//**********************
	url=url+"&currmonthprdnqty="+document.getElementById("txtProdqtyFormonth").value
	url=url+"&cumprodqty="+document.getElementById("txtProdqtyCum").value
	url=url+"&currmonthsaleqty="+document.getElementById("txtSaleqtyFormonth").value
	url=url+"&cumsaleqty="+document.getElementById("txtSaleqtyCum").value
	
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=turnOverUpdated 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null) 
}
/*
function turnOverUpdated()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		alert(xmlHttp.responseText)	
		document.frmCompany.reset()
		//document.frmCompany.cmbCompany.select()
	}
}*/
////////////// UPDTE MONTHLY REPORT ///////////////////////////////
function updateReport(id)
{ 	
	var typ
		
	xmlHttp=GetXmlHttpObject()	
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	 document.getElementById("w").innerHTML="<embed src='movieProfile/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	 document.getElementById("w1").innerHTML="<embed src='movieProfile/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	 if(document.getElementById("cmbCompany").value==0)
	{
		alert("You should select the company")
		//document.frmMonthlyReport.cmbCompany.select()
		return
	}
	if(document.getElementById("cmbYear").value==0)
	{
		alert("You should select the financial year")
		//document.frmMonthlyReport.cmbYear.select()
		return
	}
	if(document.getElementById("cmbMonth").value==0)
	{
		alert("You should select the month")
		//document.frmMonthlyReport.cmbMonth.select()
		return
	}
	//alert(document.getElementById("txtActual").value)
	var url1="updateMonthlyReport.php"	
	url="type="+typ
	url=url+"&rptid="+id
	url=url+"&company="+document.getElementById("cmbCompany").value
	url=url+"&finyear="+document.getElementById("cmbYear").value
	url=url+"&month="+document.getElementById("cmbMonth").value
	
	url=url+"&actualmanpower="+document.getElementById("txtActual").value
	url=url+"&effectivemanpower="+document.getElementById("txtEffective").value
	url=url+"&currentsale="+document.getElementById("txtCurrentSale").value
	url=url+"&actualsale="+document.getElementById("txtActualSale").value
	url=url+"&cumulativesale="+document.getElementById("txtCumulativeSale").value
	url=url+"&currentstock="+document.getElementById("txtCurrentStock").value
	url=url+"&actualstock="+document.getElementById("txtActualStock").value
	url=url+"&cumulativestock="+document.getElementById("txtCumulativeStock").value
	
	url=url+"&currentrawmaterial="+document.getElementById("txtCurrentRawMaterial").value
	
	url=url+"&actualrawmaterial="+document.getElementById("txtActualRawmaterial").value
	
	url=url+"&cumulativerawmaterial="+document.getElementById("txtCumulativeRawmaterial").value
	url=url+"&currentpowerfuel="+document.getElementById("txtCurrent_Power_Fuel").value
	
	url=url+"&actualpowerfuel="+document.getElementById("txtActual_Power_Fuel").value
	url=url+"&cumulativepowerfuel="+document.getElementById("txtCumulative_Power_Fuel").value
	url=url+"&currentothervariablecost="+document.getElementById("txtCurrent_Other_Variablecost").value
	//alert(url)
	url=url+"&actualothervariablecost="+document.getElementById("txtActual_Other_Variablecost").value
	url=url+"&cumulativeothervariablecost="+document.getElementById("txtCumulative_Other_Variablecost").value
	url=url+"&currentemployeecost="+document.getElementById("txtCurrentEmployeeCost").value
	url=url+"&actualemployeecost="+document.getElementById("txtActualEmployeeCost").value
	url=url+"&cumulativeemployeecost="+document.getElementById("txtCumulativeEmployeeCost").value
	url=url+"&currentotherexpense="+document.getElementById("txtCurrentOtherExpense").value
	url=url+"&actualotherexpense="+document.getElementById("txtActualOtherExpense").value
	url=url+"&cumulativeotherexpense="+document.getElementById("txtCumulativeOtherExpense").value
	url=url+"&currentlongtermloan="+document.getElementById("txtCurrentLongTermLoan").value
	url=url+"&actuallongtermloan="+document.getElementById("txtActualLongTermLoan").value
	url=url+"&cumulativelongtermloan="+document.getElementById("txtCumulativeLongTermLoan").value
	url=url+"&currentworkingtermloan="+document.getElementById("txtCurrentWorkingTermLoan").value
	url=url+"&actualworkingtermloan="+document.getElementById("txtActualWorkingTermLoan").value
	url=url+"&cumulativeworkingtermloan="+document.getElementById("txtCumulativeWorkingTermLoan").value
	url=url+"&currentotherincome="+document.getElementById("txtCurrentOtherIncome").value
	url=url+"&actualotherincome="+document.getElementById("txtActualOtherIncome").value
	url=url+"&cumulativeotherincome="+document.getElementById("txtCumulativeOtherIncome").value
	url=url+"&currentdepr="+document.getElementById("txtCurrentDepreciation").value
	url=url+"&actualdepr="+document.getElementById("txtActualDepreciation").value
	url=url+"&cumulativedepr="+document.getElementById("txtCumulativeDepreciation").value
	url=url+"&salesrealisation="+document.getElementById("txtSalesRealisation").value
	url=url+"&valueoforders="+document.getElementById("txtValueOfOrders").value
	url=url+"&pf="+document.getElementById("txtPF").value
	url=url+"&esi="+document.getElementById("txtESI").value
	url=url+"&sundrycreditors="+document.getElementById("txtSundryCreditors").value
	url=url+"&sundrydebtors="+document.getElementById("txtSundryDebtors").value	
	url=url+"&currentproduction="+document.getElementById("txtTotCurrent").value
	url=url+"&actualproduction="+document.getElementById("txtTotActual").value
	url=url+"&cumulativeproduction="+document.getElementById("txtTotCumulative").value
	url=url+"&currentcost="+document.getElementById("txtTotCurrentCost").value
	url=url+"&actualcost="+document.getElementById("txtTotActualCost").value
	url=url+"&cumulativecost="+document.getElementById("txtTotCumulativeCost").value
	url=url+"&currentprofit1="+document.getElementById("txtCurrentProfit").value
	url=url+"&actualprofit1="+document.getElementById("txtActualProfit").value
	url=url+"&cumulativeprofit1="+document.getElementById("txtCumulativeProfit").value	
	url=url+"&currentprofit2="+document.getElementById("txtCurrentDepr").value
	url=url+"&actualprofit2="+document.getElementById("txtActualDepr").value
	url=url+"&cumulativeprofit2="+document.getElementById("txtCumulativeDepr").value
	url=url+"&currentcashprofit="+document.getElementById("txtcurrentCashProfit").value
	url=url+"&actualcashprofit="+document.getElementById("txtActualCashProfit").value
	url=url+"&cumulativecashprofit="+document.getElementById("txtCumulativeCashProfit").value
	url=url+"&currentnetprofit="+document.getElementById("txtCurrentNet").value
	url=url+"&actualnetprofit="+document.getElementById("txtActualNet").value
	url=url+"&cumulativenetprofit="+document.getElementById("txtCumulativeNet").value
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtUsedCapacity")
		{
			url=url+"&usedcapacity"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totusedcapacity="+tot
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtMachineEfficiency")
		{
			url=url+"&machineefficiency"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totmachineefficiency="+tot

	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtCapacityUtilization")
		{
			url=url+"&capacityutilization"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcapacityutilization="+tot
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)  
	{
		if(document.frmMonthlyReport.elements[i].name=="txtProdqtyFormonth")
		{
			url=url+"&currmonthprdnqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcurrmonthprdnqty="+tot
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtProdqtyCum")
		{
			url=url+"&cumprodqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcumprodqty="+tot

	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtSaleqtyFormonth")
		{
			url=url+"&currmonthsaleqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcurrmonthsaleqty="+tot
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtSaleqtyCum")
		{
			url=url+"&cumsaleqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcumsaleqty="+tot
		
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtItCode")
		{
			url=url+"&itcode"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totitcode="+tot

	//alert(url);
	//exit();
	
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=ReportUpdated 
	
	
	xmlHttp.open("POST",url1,true)
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", url.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(url) 
	//alert("dd")
}




// .............. updateReportMD .......................



function updateReportMD(id)
{ 
	xmlHttp=GetXmlHttpObject()
	var typ
	if (xmlHttp==null)
	 {
	 alert ("Browser does not support HTTP Request")
	 return
	 }
	 //alert(document.getElementById("w1").innerHTML)
	 document.getElementById("w").innerHTML="<embed src='movieProfile/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	 document.getElementById("w1").innerHTML="<embed src='movieProfile/wait.swf' width=230 height=20 pluginspage='http://www.macromedia.com/go/getflashplayer' pluginspage='http://www.macromedia.com/go/getflashplayer'>" 
	 if(document.getElementById("cmbCompany").value==0)
	{
		alert("You should select the company")
		//document.frmMonthlyReport.cmbCompany.select()
		return
	}
	if(document.getElementById("cmbYear").value==0)
	{
		alert("You should select the financial year")
		//document.frmMonthlyReport.cmbYear.select()
		return
	}
	if(document.getElementById("cmbMonth").value==0)
	{
		alert("You should select the month")
		//document.frmMonthlyReport.cmbMonth.select()
		return
	}
	//alert(document.getElementById("txtActual").value)
	var url1="updateMonthlyReport.php"
	var url	
	url="type="+typ
	url=url+"&rptid="+id
	url=url+"&company="+document.getElementById("cmbCompany").value
	url=url+"&finyear="+document.getElementById("cmbYear").value
	url=url+"&month="+document.getElementById("cmbMonth").value
	
	url=url+"&effectivemanpower="+document.getElementById("txtEffective").value
	url=url+"&actualmanpower="+document.getElementById("txtActual").value
	url=url+"&currentsale="+document.getElementById("txtCurrentSale").value
	url=url+"&actualsale="+document.getElementById("txtActualSale").value
	url=url+"&cumulativesale="+document.getElementById("txtCumulativeSale").value
	url=url+"&currentstock="+document.getElementById("txtCurrentStock").value
	url=url+"&actualstock="+document.getElementById("txtActualStock").value
	url=url+"&cumulativestock="+document.getElementById("txtCumulativeStock").value
	
	url=url+"&currentrawmaterial="+document.getElementById("txtCurrentRawMaterial").value
	
	url=url+"&actualrawmaterial="+document.getElementById("txtActualRawmaterial").value
	
	url=url+"&cumulativerawmaterial="+document.getElementById("txtCumulativeRawmaterial").value
	url=url+"&currentpowerfuel="+document.getElementById("txtCurrent_Power_Fuel").value
	
	url=url+"&actualpowerfuel="+document.getElementById("txtActual_Power_Fuel").value
	url=url+"&cumulativepowerfuel="+document.getElementById("txtCumulative_Power_Fuel").value
	url=url+"&currentothervariablecost="+document.getElementById("txtCurrent_Other_Variablecost").value
	//alert(url)
	url=url+"&actualothervariablecost="+document.getElementById("txtActual_Other_Variablecost").value
	url=url+"&cumulativeothervariablecost="+document.getElementById("txtCumulative_Other_Variablecost").value
	url=url+"&currentemployeecost="+document.getElementById("txtCurrentEmployeeCost").value
	url=url+"&actualemployeecost="+document.getElementById("txtActualEmployeeCost").value
	url=url+"&cumulativeemployeecost="+document.getElementById("txtCumulativeEmployeeCost").value
	url=url+"&currentotherexpense="+document.getElementById("txtCurrentOtherExpense").value
	url=url+"&actualotherexpense="+document.getElementById("txtActualOtherExpense").value
	url=url+"&cumulativeotherexpense="+document.getElementById("txtCumulativeOtherExpense").value
	url=url+"&currentlongtermloan="+document.getElementById("txtCurrentLongTermLoan").value
	url=url+"&actuallongtermloan="+document.getElementById("txtActualLongTermLoan").value
	url=url+"&cumulativelongtermloan="+document.getElementById("txtCumulativeLongTermLoan").value
	url=url+"&currentworkingtermloan="+document.getElementById("txtCurrentWorkingTermLoan").value
	url=url+"&actualworkingtermloan="+document.getElementById("txtActualWorkingTermLoan").value
	url=url+"&cumulativeworkingtermloan="+document.getElementById("txtCumulativeWorkingTermLoan").value
	url=url+"&currentotherincome="+document.getElementById("txtCurrentOtherIncome").value
	url=url+"&actualotherincome="+document.getElementById("txtActualOtherIncome").value
	url=url+"&cumulativeotherincome="+document.getElementById("txtCumulativeOtherIncome").value
	url=url+"&currentdepr="+document.getElementById("txtCurrentDepreciation").value
	url=url+"&actualdepr="+document.getElementById("txtActualDepreciation").value
	url=url+"&cumulativedepr="+document.getElementById("txtCumulativeDepreciation").value
	url=url+"&salesrealisation="+document.getElementById("txtSalesRealisation").value
	url=url+"&valueoforders="+document.getElementById("txtValueOfOrders").value
	url=url+"&pf="+document.getElementById("txtPF").value
	url=url+"&esi="+document.getElementById("txtESI").value
	url=url+"&sundrycreditors="+document.getElementById("txtSundryCreditors").value
	url=url+"&sundrydebtors="+document.getElementById("txtSundryDebtors").value	
	url=url+"&currentproduction="+document.getElementById("txtTotCurrent").value
	url=url+"&actualproduction="+document.getElementById("txtTotActual").value
	url=url+"&cumulativeproduction="+document.getElementById("txtTotCumulative").value
	url=url+"&currentcost="+document.getElementById("txtTotCurrentCost").value
	url=url+"&actualcost="+document.getElementById("txtTotActualCost").value
	url=url+"&cumulativecost="+document.getElementById("txtTotCumulativeCost").value
	url=url+"&currentprofit1="+document.getElementById("txtCurrentProfit").value
	url=url+"&actualprofit1="+document.getElementById("txtActualProfit").value
	url=url+"&cumulativeprofit1="+document.getElementById("txtCumulativeProfit").value	
	url=url+"&currentprofit2="+document.getElementById("txtCurrentDepr").value
	url=url+"&actualprofit2="+document.getElementById("txtActualDepr").value
	url=url+"&cumulativeprofit2="+document.getElementById("txtCumulativeDepr").value
	url=url+"&currentcashprofit="+document.getElementById("txtcurrentCashProfit").value
	url=url+"&actualcashprofit="+document.getElementById("txtActualCashProfit").value
	url=url+"&cumulativecashprofit="+document.getElementById("txtCumulativeCashProfit").value
	url=url+"&currentnetprofit="+document.getElementById("txtCurrentNet").value
	url=url+"&actualnetprofit="+document.getElementById("txtActualNet").value
	url=url+"&cumulativenetprofit="+document.getElementById("txtCumulativeNet").value
	url=url+"&status="+document.getElementById("cmbStatus").value
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtUsedCapacity")
		{
			url=url+"&usedcapacity"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totusedcapacity="+tot
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtMachineEfficiency")
		{
			url=url+"&machineefficiency"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totmachineefficiency="+tot
	tot=tot-1	
	
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtCapacityUtilization")
		{
			url=url+"&capacityutilization"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcapacityutilization="+tot

	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtProdqtyFormonth")
		{
			url=url+"&currmonthprdnqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcurrmonthprdnqty="+tot
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtProdqtyCum")
		{
			url=url+"&cumprodqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"totcumprodqty="+tot
	
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtSaleqtyFormonth")
		{
			url=url+"&currmonthsaleqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcurrmonthsaleqty="+tot
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtSaleqtyCum")
		{
			url=url+"&cumsaleqty"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"totcumsaleqty="+tot

	
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtItCode")
		{
			url=url+"&itcode"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totitcode="+tot
	//alert(url.length)
	
	url=url+"&sid="+Math.random()	
	xmlHttp.onreadystatechange=ReportUpdated 
	xmlHttp.open("POST",url1,true)
	
	// alert(url);
	
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", url.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(url) 
}


function ReportUpdated()
{
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{	
		 //alert("sf")
		 document.getElementById("w").innerHTML=""
		 document.getElementById("w1").innerHTML=""
		 document.getElementById("w2").innerHTML=""
		alert(xmlHttp.responseText)	
		window.location.reload()
		//document.getElementById("disp").innerHTML=xmlHttp.responseText
		//window.location="index.php"
		//dispmain('monthlyreport')
	}
	else if(xmlHttp.readyState==1 || xmlHttp.readyState=="loading")
	{
		document.getElementById("w2").innerHTML="Updating......"
	}
}

function calcProfirability()
{	
	var a,b,c,d,e

	//=================================== VALUE OF PRODUCTION [a+b] =================================
	if(!isNaN(document.getElementById("txtCurrentSale").value) && document.getElementById("txtCurrentSale").value!="")
	{
		a=document.getElementById("txtCurrentSale").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCurrentStock").value) && document.getElementById("txtCurrentStock").value!="")
	{
		b=document.getElementById("txtCurrentStock").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtTotCurrent").value=parseFloat(a)+parseFloat(b)
	if(!isNaN(document.getElementById("txtActualSale").value) && document.getElementById("txtActualSale").value!="")
	{
		a=document.getElementById("txtActualSale").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtActualStock").value) && document.getElementById("txtActualStock").value!="")
	{
		b=document.getElementById("txtActualStock").value
	}
	else
	{
		b=0
	}	
	document.getElementById("txtTotActual").value=parseFloat(a)+parseFloat(b)
	if(!isNaN(document.getElementById("txtCumulativeSale").value) && document.getElementById("txtCumulativeSale").value!="")
	{
		a=document.getElementById("txtCumulativeSale").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCumulativeStock").value) && document.getElementById("txtCumulativeStock").value!="")
	{
		b=document.getElementById("txtCumulativeStock").value
	}
	else
	{
		b=0
	}	
	
	document.getElementById("txtTotCumulative").value=parseFloat(a)+parseFloat(b)
	

	//======================================= COST AND DEPR [d+e]]===========================================
	
	
	if(!isNaN(document.getElementById("txtCurrentRawMaterial").value) && document.getElementById("txtCurrentRawMaterial").value!="")
	{
		a=document.getElementById("txtCurrentRawMaterial").value
	}
	else
	{
		a=0
	}
	
	if(!isNaN(document.getElementById("txtCurrent_Power_Fuel").value) && document.getElementById("txtCurrent_Power_Fuel").value!="")
	{
		b=document.getElementById("txtCurrent_Power_Fuel").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtCurrent_Other_Variablecost").value) && document.getElementById("txtCurrent_Other_Variablecost").value!="")
	{
		c=document.getElementById("txtCurrent_Other_Variablecost").value
	}
	else
	{
		c=0
	}
	if(!isNaN(document.getElementById("txtCurrentEmployeeCost").value) && document.getElementById("txtCurrentEmployeeCost").value!="")
	{
		d=document.getElementById("txtCurrentEmployeeCost").value
	}
	else
	{
		d=0
	}
	if(!isNaN(document.getElementById("txtCurrentOtherExpense").value) && document.getElementById("txtCurrentOtherExpense").value!="")
	{
		e=document.getElementById("txtCurrentOtherExpense").value
	}
	else
	{
		e=0
	}
	document.getElementById("txtTotCurrentCost").value=parseFloat(a)+parseFloat(b)+parseFloat(c)+parseFloat(d)+parseFloat(e)
	if(!isNaN(document.getElementById("txtActualRawmaterial").value) && document.getElementById("txtActualRawmaterial").value!="")
	{
		a=document.getElementById("txtActualRawmaterial").value
	}
	else
	{
		a=0
	}
	
	if(!isNaN(document.getElementById("txtActual_Power_Fuel").value) && document.getElementById("txtActual_Power_Fuel").value!="")
	{
		b=document.getElementById("txtActual_Power_Fuel").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtActual_Other_Variablecost").value) && document.getElementById("txtActual_Other_Variablecost").value!="")
	{
		c=document.getElementById("txtActual_Other_Variablecost").value
	}
	else
	{
		c=0
	}
	if(!isNaN(document.getElementById("txtActualEmployeeCost").value) && document.getElementById("txtActualEmployeeCost").value!="")
	{
		d=document.getElementById("txtActualEmployeeCost").value
	}
	else
	{
		d=0
	}
	if(!isNaN(document.getElementById("txtActualOtherExpense").value) && document.getElementById("txtActualOtherExpense").value!="")
	{
		e=document.getElementById("txtActualOtherExpense").value
	}
	else
	{
		e=0
	}
	document.getElementById("txtTotActualCost").value=parseFloat(a)+parseFloat(b)+parseFloat(c)+parseFloat(d)+parseFloat(e)
	
	if(!isNaN(document.getElementById("txtCumulativeRawmaterial").value) && document.getElementById("txtCumulativeRawmaterial").value!="")
	{
		a=document.getElementById("txtCumulativeRawmaterial").value
	}
	else
	{
		a=0
	}
	
	if(!isNaN(document.getElementById("txtCumulative_Power_Fuel").value) && document.getElementById("txtCumulative_Power_Fuel").value!="")
	{
		b=document.getElementById("txtCumulative_Power_Fuel").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtCumulative_Other_Variablecost").value) && document.getElementById("txtCumulative_Other_Variablecost").value!="")
	{
		c=document.getElementById("txtCumulative_Other_Variablecost").value
	}
	else
	{
		c=0
	}
	if(!isNaN(document.getElementById("txtCumulativeEmployeeCost").value) && document.getElementById("txtCumulativeEmployeeCost").value!="")
	{
		d=document.getElementById("txtCumulativeEmployeeCost").value
	}
	else
	{
		d=0
	}
	if(!isNaN(document.getElementById("txtCumulativeOtherExpense").value) && document.getElementById("txtCumulativeOtherExpense").value!="")
	{
		e=document.getElementById("txtCumulativeOtherExpense").value
	}
	else
	{
		e=0
	}
	document.getElementById("txtTotCumulativeCost").value=parseFloat(a)+parseFloat(b)+parseFloat(c)+parseFloat(d)+parseFloat(e)
	
	
	//------------------------
	
 if(!isNaN(document.getElementById("txtCurrentSale").value) && document.getElementById("txtCurrentSale").value!="")
	{
		a=document.getElementById("txtCurrentSale").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtTotCurrentCost").value) && document.getElementById("txtTotCurrentCost").value!="")
	{
		b=document.getElementById("txtTotCurrentCost").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtCurrentProfit").value=document.getElementById("txtTotCurrent").value-parseFloat(b)
	if(!isNaN(document.getElementById("txtActualSale").value) && document.getElementById("txtActualSale").value!="")
	{
		a=document.getElementById("txtActualSale").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtTotActualCost").value) && document.getElementById("txtTotActualCost").value!="")
	{
		b=document.getElementById("txtTotActualCost").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtActualProfit").value=document.getElementById("txtTotActual").value-parseFloat(b)
	if(!isNaN(document.getElementById("txtCumulativeSale").value) && document.getElementById("txtCumulativeSale").value!="")
	{
		a=document.getElementById("txtCumulativeSale").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtTotCumulativeCost").value) && document.getElementById("txtTotCumulativeCost").value!="")
	{
		b=document.getElementById("txtTotCumulativeCost").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtCumulativeProfit").value=document.getElementById("txtTotCumulative").value-parseFloat(b)
	
	//================================================ PROFIT BEFORE DEPR [g-h] ==========================
	if(!isNaN(document.getElementById("txtCurrentProfit").value) && document.getElementById("txtCurrentProfit").value!="")
	{
		a=document.getElementById("txtCurrentProfit").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCurrentLongTermLoan").value) && document.getElementById("txtCurrentLongTermLoan").value!="")
	{
		b=document.getElementById("txtCurrentLongTermLoan").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtCurrentWorkingTermLoan").value) && document.getElementById("txtCurrentWorkingTermLoan").value!="")
	{
		c=document.getElementById("txtCurrentWorkingTermLoan").value
	}
	else
	{
		c=0
	}
	document.getElementById("txtCurrentDepr").value=parseFloat(a)-(parseFloat(b)+parseFloat(c))

if(!isNaN(document.getElementById("txtActualProfit").value) && document.getElementById("txtActualProfit").value!="")
	{
		a=document.getElementById("txtActualProfit").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtActualLongTermLoan").value) && document.getElementById("txtActualLongTermLoan").value!="")
	{
		b=document.getElementById("txtActualLongTermLoan").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtActualWorkingTermLoan").value) && document.getElementById("txtActualWorkingTermLoan").value!="")
	{
		c=document.getElementById("txtActualWorkingTermLoan").value
	}
	else
	{
		c=0
	}
	document.getElementById("txtActualDepr").value=parseFloat(a)-(parseFloat(b)+parseFloat(c))
	
	if(!isNaN(document.getElementById("txtCumulativeProfit").value) && document.getElementById("txtCumulativeProfit").value!="")
	{
		a=document.getElementById("txtCumulativeProfit").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCumulativeLongTermLoan").value) && document.getElementById("txtCumulativeLongTermLoan").value!="")
	{
		b=document.getElementById("txtCumulativeLongTermLoan").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtCumulativeWorkingTermLoan").value) && document.getElementById("txtCumulativeWorkingTermLoan").value!="")
	{
		c=document.getElementById("txtCumulativeWorkingTermLoan").value
	}
	else
	{
		c=0
	}
	document.getElementById("txtCumulativeDepr").value=parseFloat(a)-(parseFloat(b)+parseFloat(c))
	
	//================================================= CASH PROFIT [I+J] ===================================
	if(!isNaN(document.getElementById("txtCurrentDepr").value) && document.getElementById("txtCurrentDepr").value!="")
	{
		a=document.getElementById("txtCurrentDepr").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCurrentOtherIncome").value) && document.getElementById("txtCurrentOtherIncome").value!="")
	{
		b=document.getElementById("txtCurrentOtherIncome").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtcurrentCashProfit").value=parseFloat(a)+parseFloat(b)
	
	if(!isNaN(document.getElementById("txtActualDepr").value) && document.getElementById("txtActualDepr").value!="")
	{
		a=document.getElementById("txtActualDepr").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtActualOtherIncome").value) && document.getElementById("txtActualOtherIncome").value!="")
	{
		b=document.getElementById("txtActualOtherIncome").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtActualCashProfit").value=parseFloat(a)+parseFloat(b)
	
	if(!isNaN(document.getElementById("txtCumulativeDepr").value) && document.getElementById("txtCumulativeDepr").value!="")
	{
		a=document.getElementById("txtCumulativeDepr").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCumulativeOtherIncome").value) && document.getElementById("txtCumulativeOtherIncome").value!="")
	{
		b=document.getElementById("txtCumulativeOtherIncome").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtCumulativeCashProfit").value=parseFloat(a)+parseFloat(b)
	
	//======================================= NET PROFIT [K-L] =============================================
	if(!isNaN(document.getElementById("txtcurrentCashProfit").value) && document.getElementById("txtcurrentCashProfit").value!="")
	{
		a=document.getElementById("txtcurrentCashProfit").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCurrentDepreciation").value) && document.getElementById("txtCurrentDepreciation").value!="")
	{
		b=document.getElementById("txtCurrentDepreciation").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtCurrentNet").value=parseFloat(a)-parseFloat(b)
	
	
	if(!isNaN(document.getElementById("txtActualCashProfit").value) && document.getElementById("txtActualCashProfit").value!="")
	{
		a=document.getElementById("txtActualCashProfit").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtActualDepreciation").value) && document.getElementById("txtActualDepreciation").value!="")
	{
		b=document.getElementById("txtActualDepreciation").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtActualNet").value=parseFloat(a)-parseFloat(b)
	
	if(!isNaN(document.getElementById("txtCumulativeCashProfit").value) && document.getElementById("txtCumulativeCashProfit").value!="")
	{
		a=document.getElementById("txtCumulativeCashProfit").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCumulativeDepreciation").value) && document.getElementById("txtCumulativeDepreciation").value!="")
	{
		b=document.getElementById("txtCumulativeDepreciation").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtCumulativeNet").value=parseFloat(a)-parseFloat(b)
	
	/*
	document.getElementById("txtActualSale").value=(Math.round(document.getElementById("txtActualSale").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeSale").value=(Math.round(document.getElementById("txtCumulativeSale").value*100)/100).toFixed(2)
	document.getElementById("txtActualStock").value=(Math.round(document.getElementById("txtActualStock").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeStock").value=(Math.round(document.getElementById("txtCumulativeStock").value*100)/100).toFixed(2)
	
	document.getElementById("txtActualRawmaterial").value=(Math.round(document.getElementById("txtActualRawmaterial").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeRawmaterial").value=(Math.round(document.getElementById("txtCumulativeRawmaterial").value*100)/100).toFixed(2)
	
	document.getElementById("txtActual_Power_Fuel").value=(Math.round(document.getElementById("txtActual_Power_Fuel").value*100)/100).toFixed(2)
	document.getElementById("txtCumulative_Power_Fuel").value=(Math.round(document.getElementById("txtCumulative_Power_Fuel").value*100)/100).toFixed(2)
	
	document.getElementById("txtActual_Other_Variablecost").value=(Math.round(document.getElementById("txtActual_Other_Variablecost").value*100)/100).toFixed(2)
	document.getElementById("txtCumulative_Other_Variablecost").value=(Math.round(document.getElementById("txtCumulative_Other_Variablecost").value*100)/100).toFixed(2)
	
		document.getElementById("txtActualEmployeeCost").value=(Math.round(document.getElementById("txtActualEmployeeCost").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeEmployeeCost").value=(Math.round(document.getElementById("txtCumulativeEmployeeCost").value*100)/100).toFixed(2)
	
		document.getElementById("txtActualOtherExpense").value=(Math.round(document.getElementById("txtActualOtherExpense").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeOtherExpense").value=(Math.round(document.getElementById("txtCumulativeOtherExpense").value*100)/100).toFixed(2)
	
	document.getElementById("txtActualOtherExpense").value=(Math.round(document.getElementById("txtActualOtherExpense").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeOtherExpense").value=(Math.round(document.getElementById("txtCumulativeOtherExpense").value*100)/100).toFixed(2)
	
	document.getElementById("txtActualProfit").value=(Math.round(document.getElementById("txtActualProfit").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeProfit").value=(Math.round(document.getElementById("txtCumulativeProfit").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtActualLongTermLoan").value=(Math.round(document.getElementById("txtActualLongTermLoan").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeLongTermLoan").value=(Math.round(document.getElementById("txtCumulativeLongTermLoan").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtActualWorkingTermLoan").value=(Math.round(document.getElementById("txtActualWorkingTermLoan").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeWorkingTermLoan").value=(Math.round(document.getElementById("txtCumulativeWorkingTermLoan").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtActualOtherIncome").value=(Math.round(document.getElementById("txtActualOtherIncome").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeOtherIncome").value=(Math.round(document.getElementById("txtCumulativeOtherIncome").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtActualCashProfit").value=(Math.round(document.getElementById("txtActualCashProfit").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeCashProfit").value=(Math.round(document.getElementById("txtCumulativeCashProfit").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtActualDepreciation").value=(Math.round(document.getElementById("txtActualDepreciation").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeDepreciation").value=(Math.round(document.getElementById("txtCumulativeDepreciation").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtSalesRealisation").value=(Math.round(document.getElementById("txtSalesRealisation").value*100)/100).toFixed(2)
	document.getElementById("txtPF").value=(Math.round(document.getElementById("txtPF").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtValueOfOrders").value=(Math.round(document.getElementById("txtValueOfOrders").value*100)/100).toFixed(2)
	document.getElementById("txtESI").value=(Math.round(document.getElementById("txtESI").value*100)/100).toFixed(2)
	
	
	document.getElementById("txtSundryCreditors").value=(Math.round(document.getElementById("txtSundryCreditors").value*100)/100).toFixed(2)
	document.getElementById("txtSundryDebtors").value=(Math.round(document.getElementById("txtSundryDebtors").value*100)/100).toFixed(2)
	
	*/
	//	alert(dd)
	document.getElementById("txtTotCurrent").value=(Math.round(document.getElementById("txtTotCurrent").value*100)/100).toFixed(2)
	document.getElementById("txtTotActual").value=(Math.round(document.getElementById("txtTotActual").value*100)/100).toFixed(2)
	document.getElementById("txtTotCumulative").value=(Math.round(document.getElementById("txtTotCumulative").value*100)/100).toFixed(2)
	document.getElementById("txtTotCurrentCost").value=(Math.round(document.getElementById("txtTotCurrentCost").value*100)/100).toFixed(2)
	document.getElementById("txtTotActualCost").value=(Math.round(document.getElementById("txtTotActualCost").value*100)/100).toFixed(2)
	document.getElementById("txtTotCumulativeCost").value=(Math.round(document.getElementById("txtTotCumulativeCost").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentProfit").value=(Math.round(document.getElementById("txtCurrentProfit").value*100)/100).toFixed(2)
	document.getElementById("txtActualProfit").value=(Math.round(document.getElementById("txtActualProfit").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeProfit").value=(Math.round(document.getElementById("txtCumulativeProfit").value*100)/100).toFixed(2)	
	document.getElementById("txtCurrentDepr").value=(Math.round(document.getElementById("txtCurrentDepr").value*100)/100).toFixed(2)
	document.getElementById("txtActualDepr").value=(Math.round(document.getElementById("txtActualDepr").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeDepr").value=(Math.round(document.getElementById("txtCumulativeDepr").value*100)/100).toFixed(2)
	document.getElementById("txtcurrentCashProfit").value=(Math.round(document.getElementById("txtcurrentCashProfit").value*100)/100).toFixed(2)
	document.getElementById("txtActualCashProfit").value=(Math.round(document.getElementById("txtActualCashProfit").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeCashProfit").value=(Math.round(document.getElementById("txtCumulativeCashProfit").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentNet").value=(Math.round(document.getElementById("txtCurrentNet").value*100)/100).toFixed(2)
	document.getElementById("txtActualNet").value=(Math.round(document.getElementById("txtActualNet").value*100)/100).toFixed(2)
	document.getElementById("txtCumulativeNet").value=(Math.round(document.getElementById("txtCumulativeNet").value*100)/100).toFixed(2)
	/*
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtUsedCapacity")
		{
			document.frmMonthlyReport.elements[i].value=(Math.round(document.frmMonthlyReport.elements[i].value*100)/100).toFixed(2)
			
		}
	}

	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtMachineEfficiency")
		{
			document.frmMonthlyReport.elements[i].value=(Math.round(document.frmMonthlyReport.elements[i].value*100)/100).toFixed(2)
			
		}
	}	
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtCapacityUtilization")
		{
			document.frmMonthlyReport.elements[i].value=(Math.round(document.frmMonthlyReport.elements[i].value*100)/100).toFixed(2)
			
		}
	}

	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtItCode")
		{
			document.frmMonthlyReport.elements[i].value=(Math.round(document.frmMonthlyReport.elements[i].value*100)/100).toFixed(2)
			
		}
	}
/*	
tot=1
	for(i=4;i<=document.frmMonthlyReport.length-1;i++)
	{
			document.frmMonthlyReport.elements[i].value=(Math.round(document.frmMonthlyReport.elements[i].value*100)/100).toFixed(2)
			tot=tot+1
		
	}
	tot=tot-1	
	
	url=url+"&totusedcapacity="+tot
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtMachineEfficiency")
		{
			url=url+"&machineefficiency"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totmachineefficiency="+tot
	tot=tot-1	
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtCapacityUtilization")
		{
			url=url+"&capacityutilization"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcapacityutilization="+tot	
	*/
}
function calcBudget()
{	
	var a,b,c,d,e

	//=================================== VALUE OF PRODUCTION [a+b] =================================
	if(!isNaN(document.getElementById("txtSales").value) && document.getElementById("txtSales").value!="")
	{
		a=document.getElementById("txtSales").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtStock").value) && document.getElementById("txtStock").value!="")
	{
		b=document.getElementById("txtStock").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtValueOfProduction").value=parseFloat(a)+parseFloat(b)	
	

	

	//======================================= COST AND DEPR [d+e]]===========================================
	
	
	if(!isNaN(document.getElementById("txtCurrentRawMaterial").value) && document.getElementById("txtCurrentRawMaterial").value!="")
	{
		a=document.getElementById("txtCurrentRawMaterial").value
	}
	else
	{
		a=0
	}
	
	if(!isNaN(document.getElementById("txtCurrent_Power_Fuel").value) && document.getElementById("txtCurrent_Power_Fuel").value!="")
	{
		b=document.getElementById("txtCurrent_Power_Fuel").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtCurrent_Other_Variablecost").value) && document.getElementById("txtCurrent_Other_Variablecost").value!="")
	{
		c=document.getElementById("txtCurrent_Other_Variablecost").value
	}
	else
	{
		c=0
	}
	if(!isNaN(document.getElementById("txtCurrentEmployeeCost").value) && document.getElementById("txtCurrentEmployeeCost").value!="")
	{
		d=document.getElementById("txtCurrentEmployeeCost").value
	}
	else
	{
		d=0
	}
	if(!isNaN(document.getElementById("txtCurrentOtherExpense").value) && document.getElementById("txtCurrentOtherExpense").value!="")
	{
		e=document.getElementById("txtCurrentOtherExpense").value
	}
	else
	{
		e=0
	}
	document.getElementById("txtTotalCost").value=parseFloat(a)+parseFloat(b)+parseFloat(c)+parseFloat(d)+parseFloat(e)
	
	
	
	//------------------------
	
 if(!isNaN(document.getElementById("txtSales").value) && document.getElementById("txtSales").value!="")
	{
		a=document.getElementById("txtSales").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtTotalCost").value) && document.getElementById("txtTotalCost").value!="")
	{
		b=document.getElementById("txtTotalCost").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtProfitBeforeINT").value=document.getElementById("txtValueOfProduction").value-parseFloat(b)
	
	//================================================ PROFIT BEFORE DEPR [g-h] ==========================
	if(!isNaN(document.getElementById("txtProfitBeforeINT").value) && document.getElementById("txtProfitBeforeINT").value!="")
	{
		a=document.getElementById("txtProfitBeforeINT").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCurrentLongTermLoan").value) && document.getElementById("txtCurrentLongTermLoan").value!="")
	{
		b=document.getElementById("txtCurrentLongTermLoan").value
	}
	else
	{
		b=0
	}
	if(!isNaN(document.getElementById("txtCurrentWorkingTermLoan").value) && document.getElementById("txtCurrentWorkingTermLoan").value!="")
	{
		c=document.getElementById("txtCurrentWorkingTermLoan").value
	}
	else
	{
		c=0
	}
	document.getElementById("txtProfitBeforeDepr").value=parseFloat(a)-(parseFloat(b)+parseFloat(c))


	//================================================= CASH PROFIT [I+J] ===================================
	if(!isNaN(document.getElementById("txtProfitBeforeDepr").value) && document.getElementById("txtProfitBeforeDepr").value!="")
	{
		a=document.getElementById("txtProfitBeforeDepr").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCurrentOtherIncome").value) && document.getElementById("txtCurrentOtherIncome").value!="")
	{
		b=document.getElementById("txtCurrentOtherIncome").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtCashProfit").value=parseFloat(a)+parseFloat(b)
	
	
	//======================================= NET PROFIT [K-L] =============================================
	if(!isNaN(document.getElementById("txtCashProfit").value) && document.getElementById("txtCashProfit").value!="")
	{
		a=document.getElementById("txtCashProfit").value
	}
	else
	{
		a=0
	}
	if(!isNaN(document.getElementById("txtCurrentDepreciation").value) && document.getElementById("txtCurrentDepreciation").value!="")
	{
		b=document.getElementById("txtCurrentDepreciation").value
	}
	else
	{
		b=0
	}
	document.getElementById("txtNetProfit").value=parseFloat(a)-parseFloat(b)
	
	
	
	
	
	document.getElementById("txtSales").value=(Math.round(document.getElementById("txtSales").value*100)/100).toFixed(2)
	document.getElementById("txtStock").value=(Math.round(document.getElementById("txtStock").value*100)/100).toFixed(2)
	document.getElementById("txtValueOfProduction").value=(Math.round(document.getElementById("txtValueOfProduction").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentRawMaterial").value=(Math.round(document.getElementById("txtCurrentRawMaterial").value*100)/100).toFixed(2)
	document.getElementById("txtCurrent_Power_Fuel").value=(Math.round(document.getElementById("txtCurrent_Power_Fuel").value*100)/100).toFixed(2)
	document.getElementById("txtCurrent_Other_Variablecost").value=(Math.round(document.getElementById("txtCurrent_Other_Variablecost").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentEmployeeCost").value=(Math.round(document.getElementById("txtCurrentEmployeeCost").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentOtherExpense").value=(Math.round(document.getElementById("txtCurrentOtherExpense").value*100)/100).toFixed(2)
	document.getElementById("txtTotalCost").value=(Math.round(document.getElementById("txtTotalCost").value*100)/100).toFixed(2)	
	document.getElementById("txtProfitBeforeINT").value=(Math.round(document.getElementById("txtProfitBeforeINT").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentLongTermLoan").value=(Math.round(document.getElementById("txtCurrentLongTermLoan").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentWorkingTermLoan").value=(Math.round(document.getElementById("txtCurrentWorkingTermLoan").value*100)/100).toFixed(2)
	document.getElementById("txtProfitBeforeDepr").value=(Math.round(document.getElementById("txtProfitBeforeDepr").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentOtherIncome").value=(Math.round(document.getElementById("txtCurrentOtherIncome").value*100)/100).toFixed(2)
	document.getElementById("txtCashProfit").value=(Math.round(document.getElementById("txtCashProfit").value*100)/100).toFixed(2)
	document.getElementById("txtCurrentDepreciation").value=(Math.round(document.getElementById("txtCurrentDepreciation").value*100)/100).toFixed(2)
	document.getElementById("txtNetProfit").value=(Math.round(document.getElementById("txtNetProfit").value*100)/100).toFixed(2)
	
/*	
tot=1
	for(i=4;i<=document.frmMonthlyReport.length-1;i++)
	{
			document.frmMonthlyReport.elements[i].value=(Math.round(document.frmMonthlyReport.elements[i].value*100)/100).toFixed(2)
			tot=tot+1
		
	}
	tot=tot-1	
	
	url=url+"&totusedcapacity="+tot
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtMachineEfficiency")
		{
			url=url+"&machineefficiency"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totmachineefficiency="+tot
	tot=tot-1	
	
	tot=1
	for(i=1;i<=document.frmMonthlyReport.length-1;i++)
	{
		if(document.frmMonthlyReport.elements[i].name=="txtCapacityUtilization")
		{
			url=url+"&capacityutilization"+tot+"="+document.frmMonthlyReport.elements[i].value
			tot=tot+1
		}
	}
	tot=tot-1	
	url=url+"&totcapacityutilization="+tot	
	*/
}
////////////////////////////////////////////////////////////////////
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}