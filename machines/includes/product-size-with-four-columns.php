<div class="row">
    <div class="table-responsive">
        <table class="table">
            <tbody>
            <tr>
                <td>Total Pounds</td>
                <td>
                    <div class="user-input100 validate-input">
                        <input class="user-input" type="number" name="accepts-pounds" readonly>
                    </div>
                </td>
                <td>
                    <div class="user-input100 validate-input">
                        <input class="user-input" type="number" name="rejects-top-pounds" readonly>
                    </div>
                </td>
                <td>
                    <div class="user-input100 validate-input">
                        <input class="user-input" type="number" name="rejects-bottom-pounds" readonly>
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
                    <button class="my-btn">Accepts</button>
                    <input class="dynamic-inputs" id="accepts" type="number"
                           name="accepts">
                </td>
                <td>
                    <button class="my-btn">Rejects Top</button>
                    <input class="dynamic-inputs" id="rejects-top" type="number"
                           name="rejects-top">
                </td>
                <td>
                    <button class="my-btn">Rejects Bottom</button>
                    <input class="dynamic-inputs" id="rejects-bottom" type="number"
                           name="rejects-bottom">
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
                <table class="table accepts dynamic-tables">
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
                <table class="table rejects-top dynamic-tables">
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
                <table class="table rejects-bottom dynamic-tables">
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