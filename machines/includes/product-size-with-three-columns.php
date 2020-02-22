<div class="row">
    <div class="table-responsive">
        <table class="table">
            <tbody>
            <tr>
                <td>Total Production Weight</td>
                <td>
                    <div class="user-input100 validate-input">
                        <input class="user-input" type="number" name="pallet-weight-pounds" readonly>
                    </div>
                </td>
                <td>
                    <div class="user-input100 validate-input">
                        <input class="user-input" type="number" name="cases-dumped-pounds" readonly>
                    </div>
                </td>
                <td>
                    <div class="user-input100 validate-input">
                        <input class="user-input" type="number" name="blower-box-pounds" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Product Size</td>
                <td>
                    <button class="my-btn">Pallet Weight</button>
                    <input class="dynamic-inputs" id="pallet-weight" type="number"
                           name="pallet-weight">
                </td>
                <td>
                    <button class="my-btn"># Cases Dumped</button>
                    <input class="dynamic-inputs" id="cases-dumped" type="number"
                           name="cases-dumped">
                </td>
                <td>
                    <button class="my-btn">Blower Box</button>
                    <input class="dynamic-inputs" id="blower-box" type="number"
                           name="blower-box">
                </td>
            </tr>
            </tbody>
        </table>
        <div class="row dynamic-row">
            <table class="table" style="width: 60px">
                <tbody>
                <tr></tr>
                </tbody>
            </table>
            <div>
                <table class="table pallet-weight dynamic-tables">
                    <tbody>
                    </tbody>
                </table>
            </div>
            <table class="table" style="width: 60px">
                <tbody>
                <tr></tr>
                </tbody>
            </table>
            <div>
                <table class="table cases-dumped dynamic-tables">
                    <tbody>
                    </tbody>
                </table>
            </div>
            <table class="table" style="width: 60px">
                <tbody>
                <tr></tr>
                </tbody>
            </table>
            <div>
                <table class="table blower-box dynamic-tables">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>