<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ChargeCredit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\ChargeCredit';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
      return [
        ID::make()->sortable(),

        BelongsTo::make('Payer', 'user', 'App\Nova\User'),
        Currency::make('Amount','value'),
        Select::make('Payment Method')->options([
          'Paypal' => 'paypal',
          'wallet' => 'wallet',
          'Stripe' => 'stripe',
          'Bank' => 'bank payment'
        ]),
        Text::make('Transaction Id')->hideFromIndex(),
        Select::make('Currency')->options([
          'USD' => 'USD',
        ]),
        Text::make('Payer Email')->hideFromIndex(),
        Select::make('Status')->options([
          'Rejected' => 'Rejected',
          'pending' => 'Pending',
          'approved' => 'Approved',
        ]),
        Currency::make('Exchange Amount','exchange_value'),

        DateTime::make('Updated At')->hideFromIndex(),
        DateTime::make('Created At'),

      ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
