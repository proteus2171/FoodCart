<div
    x-data="OrangeCartItem()"
    class="modal-dialog modal-dialog-centered"
    style="max-width:760px;width:calc(100% - 24px);"
    data-control="cart-item"
    data-min-quantity="{{ $minQuantity }}"
    data-price-amount="{{ $price }}"
>
    <form method="POST" wire:submit="onSave">
        <div class="modal-content border-0 overflow-hidden" style="border-radius:18px;max-height:92vh;">
            <div class="modal-header border-0" style="background:#0b2b45;color:white;border-bottom:5px solid #65bce7 !important;">
                <h4 class="modal-title fw-bold">{{ $menuItemData->name }}</h4>
                <button
                    type="button"
                    class="btn-close btn-close-white px-2"
                    data-bs-dismiss="modal"
                ></button>
            </div>

            <div style="overflow:auto;">
                @if ($showThumb)
                    <div class="modal-top" style="background:#f5ecd8;padding:14px;border-bottom:5px solid #cf2f2a;">
                        <img
                            class="img-fluid d-block mx-auto"
                            style="width:min(100%,560px);max-height:52vh;object-fit:contain;background:white;"
                            src="{!! $menuItemData->getThumb([
                                  'width' => 720,
                                  'height' => 720,
                                  'fit' => 'contain',
                                ]) !!}"
                            alt="{{ $menuItemData->name }}"
                        />
                    </div>
                @endif

                <div class="modal-body py-3">
                    @if (strlen($menuItemData->description))
                        <p class="text-muted fs-6 mb-3">{!! $menuItemData->description !!}</p>
                    @endif

                    <input type="hidden" wire:model="menuId" />
                    <input type="hidden" wire:model="rowId" />

                    <div
                        id="menu-options"
                        class="menu-options"
                        x-ref="item-options"
                    >
                        @include('igniter-orange::includes.cartbox.item-options')
                    </div>
                    <x-igniter-orange::forms.error field="menuOptions" class="text-danger mb-3"/>

                    <div class="menu-comment">
                        <textarea
                            wire:model="comment"
                            name="comment"
                            class="form-control"
                            rows="2"
                            placeholder="@lang('igniter.cart::default.label_add_comment')"
                        >{{ $cartItem ? $cartItem->comment : null }}</textarea>
                        <x-igniter-orange::forms.error field="comment" class="text-danger"/>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 py-3" style="background:#fffaf0;">
                <div class="row g-0 w-100">
                    <div class="col-sm-5 pb-3 pb-sm-0">
                        <div class="input-group input-group-lg">
                            <button
                                x-on:click="decrementQuantity()"
                                class="btn btn-outline-secondary border-2 rounded-circle p-0"
                                type="button"
                                style="width:44px;height:44px;"
                            ><i class="fa fa-minus"></i></button>
                            <input
                                x-model="quantity"
                                type="text"
                                name="quantity"
                                class="form-control bg-transparent shadow-none border-0 text-center p-0"
                                inputmode="numeric"
                                pattern="[0-9]*"
                                min="0"
                                readonly
                                autocomplete="off"
                                style="max-width:50px;"
                            >
                            <button
                                x-on:click="incrementQuantity()"
                                class="btn btn-outline-secondary border-2 rounded-circle p-0"
                                type="button"
                                style="width:44px;height:44px;"
                            ><i class="fa fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-7 ps-sm-3">
                        <button type="submit" class="btn btn-lg text-white w-100" style="background:#cf2f2a;border-color:#cf2f2a;" data-attach-loading>
                            <div class="d-flex align-items-center">
                                <div class="col text-nowrap">{!! $cartItem
                                    ? lang('igniter.cart::default.button_update')
                                    : lang('igniter.cart::default.button_add_to_order')
                                !!}</div>
                                <div class="col text-end fw-normal fs-6" x-text="total"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
