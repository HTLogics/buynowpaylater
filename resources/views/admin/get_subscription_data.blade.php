<table class="table table-striped- table-bordered" style="margin-bottom: -5px;">
    <tr class="step-title">
		<td colspan="2">Plan</td>
	</tr>    
    <tr>
		<td>Plan Id</td>
		<td>{{$subscription->plan_id}}</td>
	</tr>
	<tr>
		<td>Plan Name</td>
		<td>{{$plan->item->name}}</td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>{{$plan->item->currency}} {{number_format($plan->item->amount/100, 2)}}</td>
	</tr>
	 <tr class="step-title">
		<td colspan="2">Subscription</td>
	</tr>
	<tr>
		<td>Subscription Id</td>
		<td>{{$subscription->id}}</td>
	</tr>
	<tr>
		<td>Entity</td>
		<td>{{$subscription->entity}}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{$subscription->status}}</td>
	</tr>
	<tr>
		<td>No of Installments</td>
		<td>{{$subscription->total_count}}</td>
	</tr>
	<tr>
		<td>No of Paid Installment</td>
		<td>{{$subscription->paid_count}}</td>
	</tr>
	<tr>
		<td>Subscription Type</td>
		<td>{{$plan->period}}</td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td>{{date('d M Y', $subscription->created_at)}}</td>
	</tr>
</table>