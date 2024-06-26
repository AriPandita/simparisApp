<div class="sticky w-full py-5 pl-5 pr-5 bg-gray-100 top-16 lg:pl-0">
    <div class="w-full p-5 bg-white">
        <h2 class="pb-3 text-xl font-bold">Invoice Summary</h2>
        <div class="relative mt-2 overflow-x-auto">
            <div class="grid grid-cols-3 mb-5 gap-x-1 gap-y-3">
                <div class="col-span-3">
                    <div class="mb-1 text-xs text-gray-600">Customer Details</div>
                    <table>
                        <tr>
                            <td class="text-xs text-gray-600">Name</td>
                            <td class="text-xs text-gray-600">:</td>
                            <td class="text-sm font-semibold text-gray-900">{{(empty($name)) ? '-' : $name}}</td>
                        </tr>
                        <tr>
                            <td class="text-xs text-gray-600">Email</td>
                            <td class="text-xs text-gray-600">:</td>
                            <td class="text-sm font-semibold text-gray-900">{{(empty($email)) ? '-' : $email}}</td>
                        </tr>
                        <tr>
                            <td class="text-xs text-gray-600">Phone</td>
                            <td class="text-xs text-gray-600">:</td>
                            <td class="text-sm font-semibold text-gray-900">{{(empty($phone)) ? '-' : $phone}}</td>
                        </tr>
                        <tr>
                            <td class="text-xs text-gray-600">Country</td>
                            <td class="text-xs text-gray-600">:</td>
                            <td class="text-sm font-semibold text-gray-900">{{(empty($country)) ? '-' : $country}}</td>
                        </tr>
                        <tr>
                            <td class="text-xs text-gray-600">Address</td>
                            <td class="text-xs text-gray-600">:</td>
                            <td class="text-sm font-semibold text-gray-900">{{(empty($address)) ? '-' : $address}}</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <div class="text-xs text-gray-600">Pax:</div>
                    <div class="text-sm font-semibold text-gray-900">{{(empty($pax)) ? '-' : $pax . ' Person'}}</div>
                </div>
                <div class="col-span-2">
                    <div class="text-xs text-gray-600">Booking date:</div>
                    <div class="text-sm font-semibold text-gray-900" id="date-invoice">{{(empty($date)) ? '-' : $date}}</div>
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <tbody>
                    <tr class="text-xs text-gray-700 uppercase dark:text-gray-400 border-y">
                        <th class="py-3 rounded-s-lg">
                            Items name
                        </th>
                        <th class="py-3 rounded-e-lg">
                            Price
                        </th>
                    </tr>
                    @if (count($service_invoice) == 0)
                    <tr class="bg-white dark:bg-gray-800">
                        <th colspan="2"
                            class="flex items-center w-full py-4 mx-auto font-medium text-yellow-700 gap-x-1 whitespace-nowrap dark:text-white">
                            <svg class="w-6 h-6 text-yellow-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>tidak ada service yang dipilih</span>
                        </th>
                    </tr>
                    @endif
                    @foreach ($service_invoice as $service)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$service->service_name}}
                        </th>
                        <td class="py-4">
                            Rp {{number_format($service->price, 0, ',', '.')}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="border-y">
                    <tr class="font-semibold text-gray-900 dark:text-white">
                        <th scope="row" class="py-3 text-base">Total</th>
                        <td class="py-3">
                            @if ($pax > 1)
                            <span class="text-xs">Rp {{number_format($total, 0, ',', '.')}}</span>
                            <span class="text-xs">x {{$pax}} Person</span><br>
                            @php
                            $total = $total * $pax;
                            @endphp
                            @endif
                            <span class="text-base">Rp {{number_format($total, 0, ',', '.')}}</span>                            
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>