-- delete FROM `emp_monthly_report` WHERE rpt_id in(15,21,30,145,249,266)
 
-- update emp_monthlyreport_tot A set A.cumulative_production=(select cumulative_sale+cumulative_stock from
 -- emp_profirability_statement where Rpt_id=A.Rpt_id)

 -- update emp_monthlyreport_tot A set A.cumulative_cost=(select cumulative_rowmaterial+cumulative_power_fuel+cumulative_other_variablecost
 -- from emp_variable_expenses where Rpt_id=A.Rpt_id)

 -- update emp_monthlyreport_tot A set A.cumulative_cost=A.cumulative_cost+(select cumulative_employee_cost+cumulative_other_expense
  -- from emp_fixed_expenses where Rpt_id=A.Rpt_id)

 -- update emp_monthlyreport_tot set cumulative_profit1=cumulative_production-cumulative_cost

-- update emp_monthlyreport_tot A set A.cumulative_profit2=A.cumulative_profit1-(select cumulative_longterm_loan+cumulative_workingterm_loan
 --  from emp_financial_charges where Rpt_id=A.Rpt_id)

-- update emp_monthlyreport_tot A set A.cumulative_cash_profit=cumulative_profit2+(select cumulative_other_income
  -- from emp_otherincome_depr where Rpt_id=A.Rpt_id)

-- update emp_monthlyreport_tot A set A.cumulative_net_profit=cumulative_cash_profit-(select cumulative_depr
  -- from emp_otherincome_depr where Rpt_id=A.Rpt_id)


-- ----------------------------------------------------------------------------------
 -- update emp_monthlyreport_tot A set A.actual_production=(select actual_sale+actual_stock from
  -- emp_profirability_statement where Rpt_id=A.Rpt_id)

 -- update emp_monthlyreport_tot A set A.actual_cost=(select actual_rowmaterial+actual_power_fuel+actual_other_variablecost
 -- from emp_variable_expenses where Rpt_id=A.Rpt_id)

 -- update emp_monthlyreport_tot A set A.actual_cost=A.actual_cost+(select actual_employee_cost+actual_other_expense
--  from emp_fixed_expenses where Rpt_id=A.Rpt_id)

--  update emp_monthlyreport_tot set actual_profit1=actual_production-actual_cost

-- update emp_monthlyreport_tot A set A.actual_profit2=A.actual_profit1-(select actual_longterm_loan+actual_workingterm_loan
--   from emp_financial_charges where Rpt_id=A.Rpt_id)

-- update emp_monthlyreport_tot A set A.actual_cash_profit=actual_profit2+(select actual_other_income
--   from emp_otherincome_depr where Rpt_id=A.Rpt_id)

-- update emp_monthlyreport_tot A set A.actual_net_profit=actual_cash_profit-(select actual_depr
--   from emp_otherincome_depr where Rpt_id=A.Rpt_id)


