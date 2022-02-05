 <div id="container">
	<h1>Jawaban Soal 6</h1>

	<div id="body">
		<p>Jawaban Soal 6</p>
		<code>
			<p>Tabel buku</p>
			<form id="form-buku">
				<div class="row" style="padding-bottom: 15px;">
					<div class="col">
				    	<input type="text" class="form-control" placeholder="Title" id="title" aria-label="Title">
					</div>
					<div class="col">
				    	<input type="text" class="form-control" placeholder="Author" id="author" aria-label="Author">
					</div>
					<div class="col">
				    	<input type="number" class="form-control" placeholder="Price Rent" id="pricerent" aria-label="Price Rent">
					</div>
					<div class="col">
						<select class="form-control" name="Category" id="category" style="width: 100%;">
							<option value="MANGGA">Mangga</option>
							<option value="NOVEL">Novel</option>
							<option value="MAGAZINE">Magazine</option>
						</select>
					</div>
				</div>
				<div class="row" style="padding-bottom: 15px;">
					<div class="col-md-4">
						<button class="btn btn-outline-primary" type="button" id="save-buku">Save book</button>
						<button class="btn btn-outline-secondary" type="button" id="cancel-form-buku">Cancel</button>
					</div>
				</div>
			</form>
			<table id="tableBuku" class="table table-stripped">
				<thead>
					<th>No</th>
					<th>Title</th>
					<th>Author</th>
					<th>Price Rent</th>
					<th>Book Category</th>
				</thead>
				<tbody></tbody>
			</table>
		</code>
		<code>
			<p>Tabel customer</p>
			<form id="form-customer">
				<div class="row" style="padding-bottom: 15px;">
					<div class="col">
				    	<input type="text" class="form-control" id="name" placeholder="Name" aria-label="Name">
					</div>
					<div class="col">
				    	<input type="text" class="form-control" id="identity" placeholder="Identity Card Number" aria-label="Identity Card Number">
					</div>
					<div class="col">
				    	<input type="textbox" class="form-control" id="address" placeholder="Address" aria-label="Address">
					</div>
				</div>
				<div class="row" style="padding-bottom: 15px;">
					<div class="col-md-4">
						<button class="btn btn-outline-primary" type="button" id="save-customer">Save customer</button>
						<button class="btn btn-outline-secondary" type="button" id="cancel-form-customer">Cancel</button>
					</div>
				</div>
			</form>
			<table id="tableCustomer" class="table table-stripped">
				<thead>
					<th>No</th>
					<th>Name</th>
					<th>Identity Card Number</th>
					<th>Address</th>
				</thead>
				<tbody></tbody>
			</table>
		</code>
		<code>
			<p>Tabel rent</p>
			<form id="form-rent">
				<div class="row" style="padding-bottom: 15px;">
					<div class="col">
						<label>Customer</label>
						<select class="form-control" name="NameCustomer" id="idcustomer" style="width: 100%;">
						</select>
					</div>
					<div class="col">
						<label>Book</label>
						<select class="form-control" name="TitleBook" id="idbuku" style="width: 100%;">
						</select>
					</div>
					<div class="col">
						<label>Date Rent</label>
				    	<input type="date" class="form-control" placeholder="Date Rent" id="daterent" aria-label="Date Rented">
					</div>
					<div class="col">
						<label>Date Return</label>
				    	<input type="date" class="form-control" placeholder="Date Return" id="datereturn" aria-label="Date Return">
					</div>
				</div>
				<div class="row" style="padding-bottom: 15px;">
					<div class="col-md-4">
						<button class="btn btn-outline-primary" type="button" id="save-rent">Save rent</button>
						<button class="btn btn-outline-secondary" type="button" id="cancel-form-rent">Cancel</button>
					</div>
				</div>
			</form>
			<table id="tableRent" class="table table-stripped">
				<thead>
					<th>No</th>
					<th>Rent Id</th>
					<th>Name Customer</th>
					<th>Title Book</th>
					<th>Number Of Books Rented</th>
					<th>Number Of Borrowed Books</th>
				</thead>
				<tbody></tbody>
			</table>
		</code>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>